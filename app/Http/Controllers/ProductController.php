<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductSizePrice;
use App\Models\ProductType;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ProductController extends Controller
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
        $product = Product::all();
        $product_size_price = ProductSizePrice::all();
        $productType = ProductType::all()->pluck('type', 'id')->toArray();

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
            // 'name' =>  [
            //     'required|string|max:255',
            //     Rule::unique('table_name', 'column_name')->ignore($request)
            // ],
            'name' => 'required|string|max:255',
            'product_type_id' => 'required',
            'detail' => 'required|string',
            'image' => 'required|image',
            'product' => 'required',
            'product.*.size' => 'required',
            'product.*.price' => 'required',
        ]);

        DB::beginTransaction();

        try {
            $image = '';
            if($request->hasFile('image')){
                $image = "/" .$request->file('image')->store('images','public');
            }

            $product = Product::create([
                'name' => $request->name,
                'product_type_id'=> $request->product_type_id,
                'detail'=> $request->detail,
                'image' => $image
            ]);



            foreach ($request->product as $key => $value) {
                $product->productSizePrice()->create([
                    'size' => $value['size'],
                    'price' => $value['price'],
                ]);
            }

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
        $data = Product::findOrFail($id);
        $productType = ProductType::all()->pluck('type', 'id')->toArray();

        return view('products.edit', compact(['data', 'productType']));
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
        $request->validate([
            'name' => 'required|string|max:255',
            'product_type_id' => 'required',
            'detail' => 'required|string',
            'image' => 'nullable|image',
            'product' => 'required',
            'product.*.size' => 'required',
            'product.*.price' => 'required',
        ]);

        DB::beginTransaction();

        try {
            $product = Product::findOrFail($id);

            $image = $product->image;
            if($request->hasFile('image')){
                $image = "/" .$request->file('image')->store('images','public');
            }

            $product->update([
                'name' => $request->name,
                'product_type_id'=> $request->product_type_id,
                'detail'=> $request->detail,
                'image' => $image
            ]);


            $product->productSizePrice()->delete();

            foreach ($request->product as $key => $value) {
                $product->productSizePrice()->create([
                    'size' => $value['size'],
                    'price' => $value['price'],
                ]);
            }

            DB::commit();
            return redirect()->route('products.index');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();

        return redirect()->route('products.index');
    }
}
