<?php

namespace App\Http\Controllers\Site\Product;

use App\Basket;
use App\BasketProduct;
use App\Currency;
use App\Http\Controllers\Controller;
use App\Orders;
use App\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{



    public function order($id,$basket_id){
    $breadcrump = ['thispage' => 'Ödeme Sayfası' , 'thispageURL' => route('orderpage',[$id,$basket_id])];


        $basket  = Basket::where('id','=',$basket_id)->first();

        #user id dectypte edilerek alinmasi
        $userid  = Crypt::decrypt($id);


        #Kullacini bilgilerinin alinmasi ###############################
        $user = DB::table('users')
            ->join('user_informations' , 'users.id' , '=' ,'user_informations.user_id')
             ->join('company_inform' , 'users.id' , '=' ,'company_inform.user_id')
            ->where('users.id','=',$userid)
             ->select('users.*','user_informations.*','company_inform.*')
            ->first();

        #sepetteki urun bilgilerinin alinmasi
        $basketdata = BasketProduct::where('basket_id','=',$basket->id)->get();

        #Toplam Urun fiyati ###############################

        #Kur cekilmesi
        $currencydata =  Currency::latest('id')->first();
        $currency = number_format($currencydata->deger,2) ;

        $purchases = $basketdata->where('basket_id', '=', $basket_id)->sum('price');

        $totalPrice = number_format($purchases * $currency,2) ;
        ##############################################


        #Paytrye gonderilecek Urun Arrayi ###############################

        $products = array() ;
        foreach($basketdata as $product){
            array_push( $products,array($product->product->name, $product->product->price ==Null? $product->option->price * $currency : $product->product->price * $currency ,$product->quantity)   );
        }


        #################################
        return view('Site/pages/Products/Shop/order',compact([
            'breadcrump', 'products',
            'basket_id', 'user',
            'currency','totalPrice']));
    }







    public function ordercallback(Request $request){

        $merchant_key 	= '1sJBdebKzjP3BRD9';
        $merchant_salt	= 'MpkJG5FhAtNtYBDQ';
        $merchant_oid = $request->input('merchant_oid');
        $hash = base64_encode( hash_hmac('sha256', $merchant_oid.$merchant_salt.$request->input('status').$request->input('total_amount'), $merchant_key, true) );

        if( $hash != $request->input('hash') )
        {
            die('PAYTR notification failed: bad hash');
        }

        if($request->input('status') == 'success' ) {
            if(strstr($merchant_oid,'KK')) {
            $basket = Basket::where('merchant_oid', $merchant_oid )->first();
             $basket->sold = 1;
             $basket->save();
            }
        } else {

        }
        echo "OK";
        exit;
    }



public function successcallback(){
    $breadcrump = ['thispage' => 'Ödeme Bildirim Sayfası' , 'thispageURL' => route('successcallback')];
    return view('Site/pages/Products/Shop/successcallback',compact(['breadcrump']));
}

public function errorcallback(){
    $breadcrump = ['thispage' => 'Ödeme Bildirim Sayfası' , 'thispageURL' => route('errorcallback')];
    return view('Site/pages/Products/Shop/errorcallback',compact(['breadcrump']));
}


}//end order class
