<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class forumDiscussion extends Model
{
    public function user(){
        return $this->belongsTo('App\user');
    }
}
