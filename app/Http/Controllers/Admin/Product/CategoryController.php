<?php

namespace App\Http\Controllers\Admin\Product;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequestValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Category::all();
        return view('Admin.pages.Product.category.index',compact(['cats']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::all();
        return view('Admin.pages.Product.Category.create',compact(['cats']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequestValidate $request)
    {
            $category = new Category();

            $category->name = request('name');
            $category->slug = Str::slug(request('name'));

            $metarequestdata= ['title'=> request('metatitle') , 'description'=>request('metadescription')];

            $category->meta  = json_encode($metarequestdata);



            $category->save();
            return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('Admin.pages.Product.Category.edit',compact(['category']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequestValidate $request, Category $category)
    {
        $category->name = request('name');
        $category->slug = Str::slug(request('name'));

        $metarequestdata= ['title'=> request('metatitle') , 'description'=>request('metadescription')];

        $category->meta  = json_encode($metarequestdata);

        $category->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return back();
    }
}
