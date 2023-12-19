<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Product;
use App\Models\MemberPoint;
use App\Models\ProductSizePrice;
use App\Models\User;
use App\Models\UserProfile;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        // $todayDate = Carbon::today()->format('F j, Y');
        
        $member = MemberPoint::all();

        $dateRange = $request->input('date');
        
        // Perform the query based on the selected date range
        switch ($dateRange) {
            case 'today':
                $selectedDate = 'Today';
                $startDate = Carbon::today()->startOfDay();
                $endDate = Carbon::today()->endOfDay();
                $queryDate = $startDate->format('M/j/y');
                break;
                case 'this_week':
                    $selectedDate = 'This Week';
                    $startDate = Carbon::now()->startOfWeek();
                    $endDate = Carbon::now()->endOfWeek();
                    $queryDate = $startDate->format('M/j/y') . ' to ' . $endDate->format('M/j/y');
                    break;
                    case 'this_month':
                $selectedDate = 'This Month';
                $startDate = Carbon::now()->startOfMonth();
                $endDate = Carbon::now()->endOfMonth();
                $queryDate = $startDate->format('M/j/y') . ' to ' . $endDate->format('M/j/y');
                break;
            case 'this_year':
                $selectedDate = 'This Year';
                $startDate = Carbon::now()->startOfYear();
                $endDate = Carbon::now()->endOfYear();
                $queryDate = $startDate->format('M/j/y') . ' to ' . $endDate->format('M/j/y');
                break;
                default:
                $selectedDate = 'This Week';
                $startDate = Carbon::today()->startOfWeek();
                $endDate = Carbon::today()->endOfWeek();
                $queryDate = $startDate->format('M/j/y') . ' to ' . $endDate->format('M/j/y');
                break;
            }
            
            // $data = Invoice::latest()->paginate(10);
            $invoice_sales = Invoice::whereBetween('created_at', [$startDate, $endDate])->paginate(10);
            
            return view('invoices.list', compact('invoice_sales', 'selectedDate', 'queryDate'));
        }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $user = User::where('id', auth()->user()->id)->first();
        $invoice = Invoice::where('id', $id)->first();

        $productSizePrice = ProductSizePrice::whereIn('id',json_decode($invoice->product, true))->get();
        $qty = json_decode($invoice->quantity, true);

        $date = $invoice->created_at->format('Y-m-d H:i:s');
        return view('invoices.generate', compact('invoice', 'user', 'date', 'productSizePrice', 'qty'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'quantity' => 'required|array',
            'productSizePriceId' => 'required|array',
            'phoneNumber' => 'nullable',
            'sub_total' => 'required',
            'grand_total_usd' => 'required',
            'grand_total_khr' => 'required',
            'vat' => 'nullable',
        ]);

        DB::beginTransaction();

        try {
            $member = null;
            if ($request->phoneNumber) {
                $member = MemberPoint::firstOrCreate(['phone_number' => $request->phoneNumber], ['phone_number' => $request->phoneNumber, 'point' => 0]);
            }

            $products = [];
            $quantities = [];

            foreach ($request->productSizePriceId as $key => $value) {
                $products[] = $value;
                $quantities[$value] = $request->quantity[$key];
            }

            $invoice = Invoice::create([
                'invoice_number' => 'INV' . time(),
                'product' => json_encode($products),
                'quantity' => json_encode($quantities),
                'sub_total' => $request->sub_total,
                'vat' => $request->vat,
                'grand_total_usd' => $request->grand_total_usd,
                'grand_total_khr' => $request->grand_total_khr,
                'member_point_id' => $member ? $member->id : null,
            ]);

            if ($member) {
                $member->update([
                    'point' => $member->point + $request->grand_total_usd * 10,
                ]);
            }

            DB::commit();
            return redirect()->route('print_invoice', $invoice->id);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Nothing
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        //Nothing
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Nothing
    }
}
