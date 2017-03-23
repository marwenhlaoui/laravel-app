<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

        public function user(){
            return $this->hasOne('App\Model\User');

       }
}
