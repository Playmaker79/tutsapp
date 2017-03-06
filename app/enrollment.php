<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class enrollment extends Model

{
    protected $fillable = [
        'student_id','course_id'
    ];
    
    public function course(){
        return $this->belongsTo('App\course');
    }

    public function student(){
        return $this->belongsTo('App\user');
    }


    public function scopeStatus($query,$status){
       return $query->where('status',$status)->get()->first();
    }
    
}
