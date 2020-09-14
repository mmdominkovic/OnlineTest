<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function predmet(){
        return $this->belongsTo('App\Predmet');
    }

    public function comment(){
        return $this->hasMany('App\Comment');
    }
}
