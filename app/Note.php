<?php

namespace App;

use Cog\Contracts\Love\Likeable\Models\Likeable as LikeableContract;
use Cog\Laravel\Love\Likeable\Models\Traits\Likeable;

use Illuminate\Database\Eloquent\Model;

class Note extends Model implements LikeableContract
{

    use likeable; 

    protected $fillable = [
        'user_id' , 'file' , 'title', 'price'
    ];


    public function user() {

        return $this->belongsTo('App\User'); 

    }



    public function buyers() {

        return $this->morphMany('App\Buyer' , 'buyable'); 

    }



}
