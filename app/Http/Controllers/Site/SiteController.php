<?php

namespace App\Http\Controllers\site;

use App\About;
use App\Http\Controllers\Controller;
use App\Information;
use App\InformationCategory as InfoCat ;
use App\Product;
use App\References;
use App\Service;
use App\Slider;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrump = ['thispage' => 'Ana Sayfa' , 'thispageURL' => route('site.index')];
        $about = About::first();
        $betuls = Slider::all();
        $products = Product::orderBy('id', 'desc')->take(8)->get();
        $services = Service::orderBy('id', 'desc')->take(3)->get();
        $references = References::all();
        return view('Site.pages.home',compact(['about','products','references','betuls','services','breadcrump']));
    }


    public function services()
    {

        $about = About::first();
        $products = Product::all();
        $references = References::all();


        return view('Site.pages.home',compact(['about','products','references','breadcrump']));
    }

    public function information(){
        $infos = Information::all();
        $cats = InfoCat::all();
        $breadcrump = ['thispage' => 'Bilgilendirme Sayfası' , 'thispageURL' => route('site.information')];
        return view('Site.pages.Information.index',compact(['cats','infos','breadcrump']));
    }

    public function catalogue(){
        $breadcrump = ['thispage' => 'Katalog' , 'thispageURL' => route('site.catalogue')];
        return view('Site.pages.Catalogue.index',compact(['breadcrump']));
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
