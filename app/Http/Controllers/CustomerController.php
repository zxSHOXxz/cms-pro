<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Rank;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('admin.customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ranks = Rank::all();
        return view('admin.customers.create', compact('ranks'));
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
            'name' => "required|max:100",
            'birthday' => "required|date",
            'adress' => "required|max:190",
            'notes' => "required",
            'total_points' => "required|numeric",
        ]);

        $customer = Customer::create([
            'name' => $request->name,
            'birthday' => $request->birthday,
            'adress' => $request->adress,
            'notes' => $request->notes,
            'total_points' => $request->total_points,
            'rank_id' => '1',
        ]);
        toastr()->success('تم إضافة التصنيف بنجاح', __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.customers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('admin.customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => "required|max:100",
            'birthday' => "required|date",
            'adress' => "required|max:190",
            'notes' => "required",
            'total_points' => "required|numeric",
        ]);

        $customer->update([
            'name' => $request->name,
            'birthday' => $request->birthday,
            'adress' => $request->adress,
            'notes' => $request->notes,
            'total_points' => $request->total_points,
            'rank_id' => '1',
        ]);
        toastr()->success('تم تعديل التصنيف بنجاح', __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.customers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        toastr()->success('تم حذف التصنيف بنجاح', __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.categories.index');
    }
}
