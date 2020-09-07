<?php

namespace App\Http\Controllers\Site\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function order(){

        $breadcrump = ['thispage' => 'Ödeme Sayfası' , 'thispageURL' => route('order')];

        return view('Site/pages/Products/Shop/order',compact(['breadcrump']));
    }


    public function ordercallback(){
        $breadcrump = ['thispage' => 'Ödeme Bildirim Sayfası' , 'thispageURL' => route('ordercallback')];
        return view('Site/pages/Products/Shop/ordercallback',compact(['breadcrump']));

    }
}
