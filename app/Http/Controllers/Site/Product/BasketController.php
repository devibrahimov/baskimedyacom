<?php
/*
 * Baski_medya1!
*/
namespace App\Http\Controllers\Site\Product;

use App\AdditionalOption;
use App\Basket;
use App\BasketProduct;
use App\Currency;
use App\Http\Controllers\Controller;
use App\Option;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class BasketController extends Controller
{

    public function index($id){

     $breadcrump = ['thispage' => 'Sepet' , 'thispageURL' => route('product.addtocart')];

     $userid  = Crypt::decrypt($id) ;
     $basket = Basket::where('user_id','=',$userid)->first();
     $basket = $basket->id;
     $basketdata = BasketProduct::where('basket_id','=',$basket)->get();

        $currency = Currency::latest('id')->first();
     return view('Site.pages.Products.Shop.cart',compact(['basketdata','breadcrump','currency']));
    }


#################### ADD TO CART AJAX ###########################
    public function addtocart(Request $request){

        $user_id = Crypt::decrypt($request->user_id);
        $product_id = $request->product_id ;
        $quantity = $request->qty;

        ############  SQUARE
if($request->width && $request->height){
    $width = $request->width;
    $height= $request->height;

    $width /=100.0;
    $height /=100.0;
    $SQUARE = $width * $height  ;
    $SQUARE = number_format($SQUARE,2);
}


        ########### END SQUARE ###########

        #==================OPTIONS============================
        if($request->optionid){
            $optionid = $request->optionid;
            $option =  Option::find($optionid);
            $optionprice =$option->price ;

            $additionaloptions = $request->additionaloptions;
            //  print_r($additionaloptions); die;


        }

        $ADDITIONALPRICE =  0;

        foreach($additionaloptions as $id ){
            // echo $id.'--';
            $addops = AdditionalOption::find($id);
            $ADDITIONALPRICE +=$addops->price  ;

        }


        #==================end OPTIONS============================

        #create basket==================


        $basket = Basket::firstOrCreate([
            'user_id'=>$user_id
        ]);

        $basketid = $basket->id;

        #end basket=====================
        if($SQUARE && $optionprice)
        {
            $PRICE = (( ($optionprice+$ADDITIONALPRICE)*$SQUARE));
        }
        if($optionprice){

           $PRICE = (( ($optionprice+$ADDITIONALPRICE)*$SQUARE));
        }



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

    public  function basketfetch($id){
        $userid  = Crypt::decrypt($id);
        $basket = Basket::where('user_id','=',$userid)->first();
        $basket = $basket->id;
        $basketdata = BasketProduct::where('basket_id','=',$basket)->latest()->take(2)->get();

        $productcount =  BasketProduct::where('basket_id','=',$basket)->count() ;

        $basketproducts = '<ul class="cart_list">';

        foreach ($basketdata as $data){
            $basketproducts.='<li>
                                    <button  onclick="removeitem('.$data->id.')" class="item_remove  "><i class="ion-close"></i></button>
                                    <a href="#"><img  maxheight="150px"  alt=" '.$data->product->name.'  title=" '.$data->product->name.' " src="/storage/uploads/thumbnail/products/small/'.$data->product->image.'">'.$data->product->name.'</a>
                                    <span class="cart_quantity">'.$data->option->name.'</span>
                                    <span class="cart_quantity">'.$data->quantity.' x <span class="cart_amount"> <span class="price_symbole">$</span></span>' .$data->price.' </span>
                                </li>';
        }

        $basketproducts .= '</ul>';

        $baskethtmldata = [
            'count' => $productcount,
            'products'=>$basketproducts
        ];
        return $baskethtmldata;
    }



public function quantityedit(Request $request){

}



    public function basketremove($id){
       $basket = BasketProduct::where('id','=',$id)->first();
        $basketid = $basket->basket_id ;

      $del = $basket->delete();

      if(!$del){
          return false ;
      }else{
          return true ;
      }


    }
}//end class BasketController
