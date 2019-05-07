<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public static function getStateName($id){
    	return State::where('id',$id)->first()->name;
    }
}
