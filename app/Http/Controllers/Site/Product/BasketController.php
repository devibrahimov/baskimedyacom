<?php

namespace App\Http\Controllers\Site\Product;

use App\AdditionalOption;
use App\Basket;
use App\BasketProduct;
use App\Http\Controllers\Controller;
use App\Option;
use Illuminate\Http\Request;

class BasketController extends Controller
{

    public function index($id){

        return view('Site.pages.Products.Shop.cart');
    }



#################### ADD TO CART AJAX ###########################
    public function addtocart(Request $request){


        $user_id = $request->user_id ;
        $product_id = $request->product_id ;
        $quantity = $request->qty;


        ############  SQUARE
        $width = $request->width;
        $height= $request->height;

        $SQUARE = $width*$height ;

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


        $PRICE = (( ($optionprice+$ADDITIONALPRICE)*$SQUARE)*$quantity);
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
