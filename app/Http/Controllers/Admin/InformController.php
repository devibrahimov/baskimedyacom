<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Information;
use App\Information as Info;
use App\InformationCategory as InfoCat;
use Illuminate\Http\Request;

class InformController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infos = Info::all();
        $cats = InfoCat::all();
        return view('Admin.pages.Information.index',compact(['cats','infos']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = InfoCat::all();
        return view('Admin.pages.Information.contentcreate',compact(['cats']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator =  $request->validate([
            'category' => 'required',
            'content' => 'required',
        ]);

        if($validator){
            $inform = new Info();

            $inform->InformationCats_id =  request('category') ;
            $inform->content =  request('content');
            $inform->save();

        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function show(Information $information)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function edit(Info $information)
    {
        $cats = InfoCat::all();
        $info = $information ;
        return view('Admin.pages.Information.contentedit',compact(['cats','info']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Information $information)
    {
        $validator =  $request->validate([
            'category' => 'required',
            'content' => 'required',
        ]);

        if($validator){


            $information->InformationCats_id =  request('category') ;
            $information->content =  request('content');
            $information->save();

        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function destroy(Information $information)
    {

    }
}
