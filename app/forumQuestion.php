<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class forumQuestion extends Model
{
    public function user(){
        return $this->belongsTo('App\user');
    }

    public  function discussion(){
        return $this->hasMany('App\forumDiscussion','question_id');
    }
}
