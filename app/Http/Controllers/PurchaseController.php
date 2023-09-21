<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchases = Purchase::all();
        return view('admin.purchases.index', compact('purchases'));
    }


    public function createPurchase($id)
    {
        return view('admin.purchases.create', compact('id'));
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
            'product_name' => "required|max:100",
            'product_quantity' => "required|numeric",
            'product_price' => "required|numeric",
            'customer_id' => "required|numeric",
            'notes' => "required",
        ]);

        $customer = Customer::findOrFail($request->customer_id);
        $discount_value = $customer->rank->discount_value;
        $rank_name = $customer->rank->name;
        $total_price = $request->product_price - $discount_value;
        $purchase = Purchase::create([
            'product_name' => $request->product_name,
            'product_quantity' => $request->product_quantity,
            'product_price' => $request->product_price,
            'discount_value' => $discount_value,
            'total_price' => $total_price,
            'rank_name' => $rank_name,
            'customer_id' => $customer->id,
            'notes' => $request->notes,
        ]);

        toastr()->success('تم إضافة الشراء بنجاح', __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.purchases.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        //
    }
}
