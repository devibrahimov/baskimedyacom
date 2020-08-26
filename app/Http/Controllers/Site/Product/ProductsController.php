<?php

namespace App\Http\Controllers\site\Product;

use App\AdditionalOption;
use App\Basket;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;
use Session;
use App\Option;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('Site.pages.Products.products',compact(['products']));
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(int $id,string $slug)
    {
        $product = Product::where('slug','=',$slug)->find($id);
        $images = ProductImage::where('product_id','=',$id)->get();
        $additonaloptionparents = AdditionalOption::where('parent_id','=',NULL)->get();
         return view('Site.pages.Products.product_detail',compact(['product','images','additonaloptionparents']) );
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


    // ADD TO CART

    public function addToCart(Request $request, $id){

        $product = Product::find($id);
        $options = Option::all();
 
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $basket = new Basket($oldCart);
        $basket->add($product,$product->id);

        $request->session()->put('cart',$basket);
        dd($request->session()->get('cart'),$options);
        return redirect()->route('site.product');
    }
}
