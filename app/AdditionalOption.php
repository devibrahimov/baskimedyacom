<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdditionalOption extends Model
{
    protected $table = 'additional_options';
    protected $guarded = [] ;



    public function parent(){
        return $this->belongsto('App\AdditionalOption','parent_id');
    }


}
