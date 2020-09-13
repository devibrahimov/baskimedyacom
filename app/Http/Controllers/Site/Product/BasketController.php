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
use App\OrderProduct;
use App\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class BasketController extends Controller
{

    public function index($id)
    {

        $breadcrump = ['thispage' => 'Sepet', 'thispageURL' => route('product.addtocart')];

        $userid = Crypt::decrypt($id);
        $basket = Basket::where('user_id', '=', $userid)->first();

        $basketdata = BasketProduct::where('basket_id', '=', $basket->id)->get();

        $currency = Currency::latest('id')->first();
        return view('Site.pages.Products.Shop.cart', compact(['basketdata', 'breadcrump', 'currency']));

    }


#################### ADD TO CART AJAX ###########################
    public function addtocart(Request $request)
    {

        $user_id = Crypt::decrypt($request->user_id);
        $product_id = $request->product_id;
        $quantity = $request->qty;

        ############  SQUARE

        if ($request->width && $request->height) {
            $width = $request->width;
            $height = $request->height;

            $width /= 100.0;
            $height /= 100.0;
            $SQUARE = $width * $height;
            $SQUARE = number_format($SQUARE, 2);
        }


        ########### END SQUARE ###########

        #==================OPTIONS============================
        if ($request->optionid) {
            $optionid = $request->optionid;
            $option = Option::find($optionid);
            $optionprice = $option->price;
        }
            if(isset($request->additionaloptions)){
                $additionaloptions = $request->additionaloptions;
                $ADDITIONALPRICE = 0;

                foreach ($additionaloptions as $id) {
                    // echo $id.'--';
                    $addops = AdditionalOption::find($id);
                    $ADDITIONALPRICE += $addops->price;

                }
            }else{
                $ADDITIONALPRICE = 0 ;
            }



        #==================end OPTIONS============================

        #create basket==================


        $basket = Basket::firstOrCreate([
            'user_id' => $user_id
        ]);

        $basketid = $basket->id;

        #end basket=====================
        if (isset($SQUARE) && isset($optionprice) ) {
            $PRICE = ((($optionprice + $ADDITIONALPRICE) * $SQUARE));
        }
        if ( isset($optionprice) && !isset($SQUARE)) {

            $PRICE = isset($optionprice) + $ADDITIONALPRICE;
        }
        if (isset($SQUARE) && !isset($optionprice) ) {
            $PRICE =  (($request->price + $ADDITIONALPRICE) * $SQUARE) ;
        }
        if (!isset($optionprice) && !isset($SQUARE)) {

            $PRICE = $request->price + $ADDITIONALPRICE;
        }


        $item['basket_id'] = $basketid;
        $item['product_id'] = $product_id;
        $item['price'] = $PRICE;
        if(isset($additionaloptions)) {
            $item['additional_options'] = json_encode($additionaloptions);
        }else{
            $item['additional_options'] = Null ;
        }
        $item['quantity'] = $quantity;
        if (isset($optionid)) {
            $item['option_id'] = $optionid;
        } else {
            $item['option_id'] = null;
        }

        if (isset($SQUARE)){
            $item['square_meter'] = json_encode(['width' => $width, 'height' => $height, 'total' => $SQUARE]);
        }else{
            $item['square_meter'] = null;
        }



        $basketDB = new BasketProduct();

        $basketDB->basket_id = $item['basket_id'];
        $basketDB->product_id = $item['product_id'];
        $basketDB->option_id = $item['option_id'];
        $basketDB->additional_options = $item['additional_options'];
        $basketDB->quantity = $item['quantity'];
        $basketDB->square_meter = $item['square_meter'];
        $basketDB->price = $item['price'];
        $basketSAVE = $basketDB->save();

        if (!$basketSAVE) {
            return false;
        } else {
            return true;
        }


    }//end add to cart

    public function basketfetch($id)
    {
        $userid = Crypt::decrypt($id);
        $basket = Basket::where('user_id', '=', $userid)->first();
        $basket = $basket->id;
        $basketdata = BasketProduct::where('basket_id', '=', $basket)->latest()->take(2)->get();

        $productcount = BasketProduct::where('basket_id', '=', $basket)->count();

        $basketproducts = '<ul class="cart_list">';

        foreach ($basketdata as $data) {
            $basketproducts .= '<li>
                                    <button  onclick="removeitem(' . $data->id . ')" class="item_remove  "><i class="ion-close"></i></button>
                                    <a href="#"><img  maxheight="150px"  alt=" ' . $data->product->name . '  title=" ' . $data->product->name . ' " src="/storage/uploads/thumbnail/products/small/' . $data->product->image . '">' . $data->product->name . '</a>
                                    <span class="cart_quantity">' . $data->quantity . ' x <span class="cart_amount"> <span class="price_symbole">$</span></span>' . $data->price . ' </span>
                                </li>';
        }

        $basketproducts .= '</ul>';

        $baskethtmldata = [
            'count' => $productcount,
            'products' => $basketproducts
        ];
        return $baskethtmldata;
    }


    public function quantityedit(Request $request)
    {
        $id = $request->id ;
        $qty = $request->qty ;

        $product = BasketProduct::find($id);
       $oneproductprice =  $product->price / $product->quantity ;

       return $qty;
    }


    public function basketremove($id)
    {
        $basket = BasketProduct::where('id', '=', $id)->first();
        $basketid = $basket->basket_id;

        $del = $basket->delete();

        if (!$del) {
            return false;
        } else {
            return true;
        }


    }





    public function filesurl(Request $request){

        $validatedData = $request->validateWithBag('post', [

        ]);

        $validator = Validator::make($request->all(), [
            'uid' =>   'required',
            'filesurl' => 'required|url',
            'basketid'=>  'required'
        ],[
            'uid:required' => 'Kullanıcı belirlenemedi',
            'filesurl:required' => 'Dosya linkini doldurmadan ödeme aşamasına geçemessiniz',
            'filesurl:url' => 'Gönderdiyiniz adres url değildir.Gerçek bir url gönderin',
            'basketid:required' => 'Sepet belirlenemedi'
        ]);
        if ($validator->fails()) {
            return redirect()->route('site.addtocart', $request->uid)
                ->withErrors($validator)
                ->withInput();
        }
        $userid = $request->uid;
        $basketid= $request->basketid;
        $fileurl = $request->filesurl;
        $userdecid  = Crypt::decrypt($userid);
        $basket = Basket::find($basketid);

        $basketid = $basket->id;
        $basket_userid = $basket->user_id;

        $order = new Orders();
        $order->basket_id = $basketid ;
        $order->filesurl = $fileurl ;
        $order->user_id = $basket_userid ;
        $order->sold = 0;
        $order->save();

        $basketproductsdata = BasketProduct::where('basket_id', '=', $basketid)->get();
        //$currency = Currency::latest('id')->first();

     //   $basket->delete();
        return redirect()->route('orderpage',[$userid,$basketid]);
//        $message = [
//            'name' => Auth::user()->name,
//            'message' => 'Siparişiniz onaylanmıştır.En kısa zamanda ekibimiz sizinle iletişime geçecektir'
//        ];
//        return redirect()->route('site.index')->with('successorder',$message);
        }



}//end class BasketController
