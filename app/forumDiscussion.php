<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class forumDiscussion extends Model
{
    public function user(){
        return $this->belongsTo('App\user');
    }

    public function question(){
        return $this->belongsTo('App\question');
    }
}
