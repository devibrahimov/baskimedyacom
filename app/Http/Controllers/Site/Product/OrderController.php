<?php

namespace App\Http\Controllers\Site\Product;

use App\Basket;
use App\BasketProduct;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class OrderController extends Controller
{



    public function order(){
    $breadcrump = ['thispage' => 'Ödeme Sayfası' , 'thispageURL' => route('order')];
//        $userid  = Crypt::decrypt($id) ;
//        $basket = Basket::where('user_id','=',$userid)->first();
//
//        $basketdata = BasketProduct::where('basket_id','=',$basket->id)->get();


        return view('Site/pages/Products/Shop/order',compact(['breadcrump']));
    }


    public function ordercallback(){
        $breadcrump = ['thispage' => 'Ödeme Bildirim Sayfası' , 'thispageURL' => route('ordercallback')];
        return view('Site/pages/Products/Shop/ordercallback',compact(['breadcrump']));

    }
}
