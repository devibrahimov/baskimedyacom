<?php

namespace App\Http\Controllers\Admin\Product;

use App\BasketProduct;
use App\Currency;
use App\Http\Controllers\Controller;
use App\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function neworders(){
        $orders = Orders::where('order_completed',0)->orderBy('id','DESC')->get();
        $type= 'Yeni Siparişler' ;
        return view('Admin.pages.Product.Product.Order.orders',compact(['orders','type']));
    }

#
      public function confirmedorders(){
       $orders = Orders::where('order_completed',1)->orderBy('id','DESC')->get();
          $type= 'Onaylanmış Siparişler' ;
          return view('Admin.pages.Product.Product.Order.orders',compact(['orders','type']));
    }


    public function unconfirmedorders(){
      $orders = Orders::where('order_completed',-1)->orderBy('id','DESC')->get();
        $type= 'Onaylanmamış Siparişler' ;
          return view('Admin.pages.Product.Product.Order.orders',compact(['orders','type']));
    }

    public function completedorders(){
        $orders = Orders::where('order_completed',2)->orderBy('id','DESC')->get();
        $type= 'Tamamlanmış Siparişler' ;
          return view('Admin.pages.Product.Product.Order.orders',compact(['orders','type']));
    }



    public function orderdetail($id){
        $order = Orders::find($id);

        $user = DB::table('users')
            ->join('user_informations', 'users.id', '=', 'user_informations.user_id')
            ->join('company_inform', 'users.id', '=', 'company_inform.user_id')
            ->where('users.id', '=', $order->user_id)
            ->select('users.*', 'user_informations.*', 'company_inform.*')
            ->first();

        $basketdata = BasketProduct::where('basket_id', '=', $order->basket_id)->get();

        $currency =$order->currency;
        return view('Admin.pages.Product.Product.Order.orderdetail',compact(['order','user','basketdata','currency']));
    }

    public function orderconfirm($id,$slug){

        $order =Orders::find($id);
        if ($slug == 'onayla'){
          $order->order_completed = 1;
        }elseif ($slug == 'iptal-et'){
            $order->order_completed = -1;
        }elseif($slug == 'baski-bitti'){
            $order->order_completed = 2;
        }else{
        return back()->with('error','Yanlış Bilgi Girdiniz.Lütfen doğru komut gönderin ! Komutlar : onayla, iptal-et, baski-bitti ');
        }
        $order->save();
        return back()->with('success','Sipariş. Durum Bilgisi Güncellendi!');

    }


}
