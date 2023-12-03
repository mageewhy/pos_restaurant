<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    public function create()
    {
        $product = Product::all();
        return view('billing.billing', compact('product'));
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
            return redirect()->route('point-shops.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }
}
