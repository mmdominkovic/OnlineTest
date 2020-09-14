<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Predmet extends Model
{
    protected $table = 'predmeti';
    
    public function user(){
        return $this->belongsTo('App\User');
    }

    
    public function pitanja() 
    {
        return $this->hasMany(Pitanja::class, 'predmet_id');
    }
}
