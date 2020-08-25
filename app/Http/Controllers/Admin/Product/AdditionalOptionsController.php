<?php


namespace App\Http\Controllers\Admin\Product;

use App\AdditionalOption;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdditionalOptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $options = AdditionalOption::all();
        $parents =  AdditionalOption::where('parent_id','=',NULL)->get();
        return view('Admin.pages.Product.Additionaloptions.create',compact(['options','parents']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $option = new AdditionalOption();

        $option->name = request('name');
        $option->price = request('price');
        $option->parent_id = request('parent_id');
        $option->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AdditionalOption  $additionalOption
     * @return \Illuminate\Http\Response
     */
    public function show(AdditionalOption $additionalOption)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AdditionalOption  $additionalOption
     * @return \Illuminate\Http\Response
     */
    public function edit(AdditionalOption $additionaloption)
    {
        $options = AdditionalOption::all();
        $parents =  AdditionalOption::where('parent_id','=',NULL)->get();
        return view('Admin.pages.Product.Additionaloptions.edit',compact(['additionaloption','parents','options']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AdditionalOption  $additionalOption
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdditionalOption $additionaloption)
    {
        $additionaloption->name = request('name');
        $additionaloption->price = request('price');
        $additionaloption->parent_id = request('parent_id');
        $additionaloption->save();
        return redirect()->route('additionaloptions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AdditionalOption  $additionalOption
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdditionalOption $additionaloption)
    {
        $additionaloption->delete();
        return redirect()->route('additionaloptions.index');
    }
}
