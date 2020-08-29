<?php

namespace App\Http\Controllers\Admin;

use App\Catalogue;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('Admin.pages.home');
    }

    public function catalogue(){
        return view('Admin.pages.Catalogue.index');
    }

    public function addcatalogue(Request $request){
        $catalogue = new Catalogue();
        $catalogue->name = $request->name;
        $catalogue->lastname = $request->lastname;
        $catalogue->email = $request->email;
        $catalogue->tel = $request->phone;
        $catalogue->adres = $request->adres;
        $catalogue->save();
        return back()->with('success','Talebiniz İletildi!');
    }

    public function readcatalogue(){
        $catalogues = Catalogue::all();
        return view('Admin.pages.Catalogue.index',compact(['catalogues']));
    }

    public function delcatalogue($id){
        $catalogue = Catalogue::find($id);
        $catalogue->delete();
        return back();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
