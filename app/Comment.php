<?php

namespace App;


use Cog\Contracts\Love\Likeable\Models\Likeable as LikeableContract;
use Cog\Laravel\Love\Likeable\Models\Traits\Likeable;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model implements LikeableContract
{

    use likeable; 

    protected $fillable = [
        'commentable_type' , 'commentable_id' , 'comment', 
        'user_id'
    ];

    public function user() {

        return $this->belongsTo('App\User'); 

    }

    public function commentable() {


        return $this->morphTo(); 
        
    }


    

}
