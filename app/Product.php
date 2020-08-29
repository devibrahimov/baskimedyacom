<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
class Product extends Model
{
    protected $table = 'products';
    protected $guarded = [] ;





    public function categoryName(){
        return $this->belongsTo('App\Category','category');
    }


    public function options($parentid){
        return Option::where('parent_id','=',$parentid)->get();
    }

    public function optionchipoption($parentid){
        return Option::where('parent_id','=',$parentid)->orderBy('price' , 'ASC')->first();
    }
    public function optionparentName(){
        return  $this->belongsTo('App\Option' , 'parent_option');
    }

    public function additionaloptionsparent($parentidsJSON){
        $parentids =json_decode($parentidsJSON);
        $additionaloptions = [];

        foreach ($parentids as $parent){
            $optiondata = AdditionalOption::where('id','=',$parent)->get();
            $additionaloptions[$parent] =  $optiondata  ;

        }
        return $additionaloptions ;
    }


    public function additionaloption($id){

        $additionaloptions = AdditionalOption::where('parent_id','=',$id)->get();

        return $additionaloptions ;
    }

}
