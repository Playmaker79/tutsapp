<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chapter extends Model
{
    public  function course(){
        return $this->belongsTo('App\course');
    }
}