<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Frequency extends Model
{
    public function posts()   
{
    return $this->hasMany('App\Post');  
}

}