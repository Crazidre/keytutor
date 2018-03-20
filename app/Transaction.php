<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
       'id',  'amount' , 'user_id' , 'description' , 'invoice_id'
    ];


    public function user() {

        return $this->belongsTo('App\User'); 

    }
}
