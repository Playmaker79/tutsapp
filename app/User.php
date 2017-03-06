<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Vinkla\Hashids\Facades\Hashids;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','type','status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','type','status'
    ];

    /*relate an user to a cv*/
    public function cv(){
        return $this->hasOne('App\cv');
    }

    /*One mentor can have many courses */
    public  function course(){
        return $this->hasMany('App\course');
    }

    public function enrollment(){
        return $this->hasMany('App\enrollment','student_id');
    }

    public function getEnrolledCourseAttribute(){
        return $this->enrollment->course;
    }
}
