<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'email', 'password','phone','slug',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function fullname(){

        return $this->first_name.' '.$this->last_name;
    }


    public function img(){

        return (!empty($this->img)) ? $this->img : 'https://thebenclark.files.wordpress.com/2014/03/facebook-default-no-profile-pic.jpg' ;


        
    }




}
