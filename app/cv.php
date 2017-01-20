<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cv extends Model
{
    /*
     * The relationship : one user has a cv
     * */
    public function user(){
        return $this->belongsTo('App\user');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'path'
    ];
}
