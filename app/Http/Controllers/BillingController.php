<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\PointShop;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BillingController extends Controller
{
    public function create()
    {
        $product = Product::with('productType')->get()->groupBy('productType.type');
        $productType = ProductType::all();

        return view('billing.billing', compact('product', 'productType'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'point' => 'required|string|max:255',
            'image' => 'required|image',
        ]);

        DB::beginTransaction();

        try {
            $image = '';
            if($request->hasFile('image')){
                $image = "/" .$request->file('image')->store('images','public');
            }

            PointShop::create([
                'name' => $request->name,
                'point' => $request->point,
                'image' => $image
            ]);

            DB::commit();
            return redirect()->route('billing.create');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }
}
