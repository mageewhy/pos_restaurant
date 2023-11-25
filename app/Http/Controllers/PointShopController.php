<?php

namespace App\Http\Controllers;

use App\Models\MemberPoint;
use App\Models\PointShop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PointShopController extends Controller
{
    public function index(){
        $pointProduct = PointShop::all();
        $member_number = null;
        if (request('phone_number')) {
            $member_number = MemberPoint::where('phone_number', request('phone_number'))->first();
        }


        return view('point_shops.list', compact('pointProduct', 'member_number'));
    }

    public function create()
    {
        return view('point_shops.create');
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

    public function show($id)
    {
        $item = PointShop::findOrFail($id);

        return view('point_shops.show', compact('item'));
    }

    public function edit($id)
    {
        $data = PointShop::findOrFail($id);

        return view('point_shops.edit', compact('data'));
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
            'point' => 'required|string|max:255',
        ]);

        DB::beginTransaction();

        try {
            $product = PointShop::findOrFail($id);

            $image = $product->image;
            if($request->hasFile('image')){
                $image = "/" .$request->file('image')->store('images','public');
            }

            $product->update([
                'name' => $request->name,
                'point'=> $request->point,
                'image' => $image
            ]);

            DB::commit();
            return redirect()->route('point-shops.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {

    }

    public function memberRedeem($id, Request $request)
    {
        $member = MemberPoint::findOrFail($request->member);
        $productRedeem = PointShop::findOrFail($id);

        if ($member->point < $productRedeem->point) {
            return back()->with('error', 'Member point is not enough');
        } else {
            $member->update([
                'point' => $member->point - $productRedeem->point
            ]);

            return back()->with('success', 'Product Redeem Successfully');
        }
    }
}
