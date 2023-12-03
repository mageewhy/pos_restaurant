<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Product;
use App\Models\MemberPoint;
use App\Models\ProductSizePrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::latest()->whereNull('deleted_at')->paginate(10);

        return view('products.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('products.form', compact('product', 'product_size_price', 'productType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'quantity' => 'array',
            'productSizePriceId' => 'array',
            'phoneNumber' => 'nullable',
            'sub_total' => 'required',
            'grand_total_usd' => 'required',
            'grand_total_khr' => 'required',
            'vat' => 'nullable'
        ]);

        DB::beginTransaction();

        try {
            $member = MemberPoint::where('phone_number', $request->phoneNumber)->firstOrCreate();
            $product = [];

            foreach ($request->productSizePriceId as $key => $value) {
                $product[$key]['productSizePriceId'] = $value;
                $product[$key]['quantity'] = $request->quantity[$key];
            }

            Invoice::create([
                'invoice_number' => 'INV' . time(),
                'product' => json_encode($product),
                'sub_total' => $request->total,
                'vat' => $request->vat,
                'grand_total_usd' => $request->grand_total_usd,
                'grand_total_khr' => $request->grand_total_khr,
                'member_point_id' => $member->id,
            ]);

            $member->update([
                'point' => $member->point + $request->grand_total_usd * 10
            ]);

            DB::commit();
            return redirect()->route('products.index');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
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
