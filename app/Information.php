<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
 protected $table = 'information' ;
 protected $guarded = [] ;


 public function category(){
    return $this->belongsTo('App\informationCategory','InformationCats_id');
 }


}
