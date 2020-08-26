<?php

namespace App\Http\Controllers\Site\Product;

use App\AdditionalOption;
use App\Basket;
use App\BasketProduct;
use App\Http\Controllers\Controller;
use App\Option;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class BasketController extends Controller
{

    public function index($id){
     $userid  = Crypt::decrypt($id) ;
     $basket = Basket::where('user_id','=',$userid)->first();
     $basket = $basket->id;
     $basketdata = BasketProduct::where('basket_id','=',$basket)->get();


     return view('Site.pages.Products.Shop.cart',compact(['basketdata']));
    }



#################### ADD TO CART AJAX ###########################
    public function addtocart(Request $request){


        $user_id = Crypt::decrypt($request->user_id);
        $product_id = $request->product_id ;
        $quantity = $request->qty;


        ############  SQUARE

        $width = $request->width;
        $height= $request->height;

        $width /=100.0;
        $height /=100.0;
        $SQUARE = $width * $height  ;
        $SQUARE = number_format($SQUARE,2);

      //  print_r($SQUARE);die;
        ###########END SQUARE


        #==================OPTIONS============================
        $optionid = $request->optionid;
        $option =  Option::find($optionid);
        $optionprice =$option->price ;

        $additionaloptions = $request->additionaloptions;
        //  print_r($additionaloptions); die;


        $ADDITIONALPRICE =  0;

        foreach($additionaloptions as $id ){
            // echo $id.'--';
            $addops = AdditionalOption::find($id);
            $ADDITIONALPRICE +=$addops->price  ;

        }


        #==================end OPTIONS============================

        #create basket==================
        
//      $basketcontrol = Basket::find($user_id);
//        if(!$basketcontrol){
//
//        }else{
//
//            $basketid =  $basketcontrol->id ;
//
//        }
        $basket = Basket::firstOrCreate([
            'user_id'=>$user_id
        ]) ;

        $basketid = $basket->id;

        #end basket=====================


        $PRICE = (( ($optionprice+$ADDITIONALPRICE)*$SQUARE));
       // print_r($PRICE);die;
        //print_r($PRICE) ;die;
        $item =[
            'basket_id' => $basketid,
            'product_id' => $product_id,
            'option_id' => $optionid,
            'additional_options' =>json_encode($additionaloptions) ,
            'quantity' => $quantity,
            'square_meter' => json_encode(['width'=>$width ,'height'=> $height,'total'=> $SQUARE]),
            'price' => $PRICE
        ];

        $basketDB =  new BasketProduct();


        $basketDB->basket_id = $item['basket_id'];
        $basketDB->product_id = $item['product_id'];
        $basketDB->option_id = $item['option_id'];
        $basketDB->additional_options = $item['additional_options'];
        $basketDB->quantity = $item['quantity'];
        $basketDB->square_meter = $item['square_meter'];
        $basketDB->price = $item['price'];
        $basketSAVE =  $basketDB->save();

        if(!$basketSAVE){
            return false ;
        }else{
            return true ;
        }



    }//end add to cart

}//end class BasketController
