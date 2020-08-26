<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BasketProduct extends Model
{
    protected $table = 'basket_products' ;
    protected $guarded = [] ;



    public function product(){
        return $this->belongsTo('App\Product','product_id');
    }



    public function option(){
        return $this->belongsTo('App\Option','option_id');
    }
}
