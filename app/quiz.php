<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class quiz extends Model
{
    public function  chapter(){
       return $this->belongsTo('App\chapter');
    }

    public function question(){
       return $this->hasMany('App\question');
    }

    protected $fillable = [
        'chapter_id'
    ];
    
    
}
