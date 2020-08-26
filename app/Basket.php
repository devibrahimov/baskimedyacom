<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    protected $table = 'basket';
    protected $guarded = [] ;


    public $items = null;
    public $totalQuantity = 0;
    public $totalPrice = 0;


//    public function __construct($oldCart)
//    {
//        if ($oldCart) {
//            $this->items = $oldCart->items;
//            $this->totalQuantity = $oldCart->totalQuantity;
//            $this->totalPrice = $oldCart->totalPrice;
//        }
//    }

    public function add($item, $id)
    {
        $storedItem = ['adet' => 0, 'fiyat' => $item->price, 'item' => $item];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }

        $storedItem['adet']++;
        $storedItem['price'] = $item->price * $storedItem['adet'];
        $this->items[$id] = $storedItem;
        $this->totalQuantity++;
        $this->totalPrice += $item->price;
    }

}
