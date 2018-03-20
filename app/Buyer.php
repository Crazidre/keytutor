<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    protected $fillable = [
        'user_id' , 'buyable_type' , 'buyable_id'
    ];

    public function buyable() {

        return $this->morphTo(); 

    }


    public function user() {

        return $this->belongsTo('App\User'); 

    }
}
