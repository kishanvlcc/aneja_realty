<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{

    public function getType()
    {
        return $this->belongsTo('App\PropertyType','available_for');
    }
    public function getLocation()
    {
        return $this->belongsTo('App\PropertyLocation','short_address');
    }
}
