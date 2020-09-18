<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';
    protected $guarded = [] ;




    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
}
