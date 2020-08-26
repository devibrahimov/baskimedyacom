<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $options = Option::all();
        $parents =  Option::where('parent_id','=',NULL)->get();
        return view('Admin.pages.Product.Options.create',compact(['options','parents']));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $option = new Option();

        $option->name = request('name');
        $option->option_code = request('option_code');
        $option->price = request('price');
        $option->parent_id = request('parent_id');

        if( request('stock') == 'on'){
            $option->stock = 1 ;
        }

        $option->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function show(Option $option)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function edit(Option $option)
    {
        $options = Option::all();
        $parents =  Option::where('parent_id','=',NULL)->get();
        return view('Admin.pages.Product.Options.edit',compact(['option','parents'],'options'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Option $option)
    {

        $option->name = request('name');
        $option->option_code = request('option_code');
        $option->price = request('price');
        $option->parent_id = request('parent_id');
        if( request('stock') == 'on'){  $option->stock = 1 ; }
        if( request('stock') != 'on'){  $option->stock = 0 ; }
        $option->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function destroy(Option $option)
    {
         $option->delete();
         return redirect()->route('options.index');
    }
}
