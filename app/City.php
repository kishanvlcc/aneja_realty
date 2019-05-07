<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //

    public static function getCityName($id){
    	return City::where('id',$id)->first()->name;
    }
}
