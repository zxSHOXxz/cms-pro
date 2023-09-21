<?php

namespace App\Http\Controllers;

use App\Models\Rank;
use Illuminate\Http\Request;

class RankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ranks = Rank::all();
        return view('admin.ranks.index', compact('ranks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ranks.create');
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
            'start_at' => "required|numeric",
            'discount_value' => "required|numeric",
        ]);
        $rank = Rank::create($request->all());

        toastr()->success('تم إضافة التصنيف بنجاح', __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.ranks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rank  $rank
     * @return \Illuminate\Http\Response
     */
    public function show(Rank $rank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rank  $rank
     * @return \Illuminate\Http\Response
     */
    public function edit(Rank $rank)
    {
        return view('admin.ranks.edit', compact('rank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rank  $rank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rank $rank)
    {
        $request->validate([
            'name' => "required|max:100",
            'start_at' => "required|numeric",
            'discount_value' => "required|numeric",
        ]);
        $rank->update($request->all());

        toastr()->success('تم تعديل التصنيف بنجاح', __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.ranks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rank  $rank
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rank $rank)
    {
        $rank->delete();
        toastr()->success('تم حذف التصنيف بنجاح', __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.categories.index');
    }
}
