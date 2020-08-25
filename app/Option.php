<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Option extends Model
{
    protected $table = 'options';
    protected $guarded = [] ;



    public function parent(){
        return $this->belongsto('App\Option','parent_id');
    }

}
