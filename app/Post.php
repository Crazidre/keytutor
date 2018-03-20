<?php

namespace App;


use Cog\Contracts\Love\Likeable\Models\Likeable as LikeableContract;
use Cog\Laravel\Love\Likeable\Models\Traits\Likeable;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model implements LikeableContract
{
    use likeable ; 
    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


    public function getRouteKeyName()
{
    return 'slug';
}


    protected $fillable  = [ 
        'title' , 'image' , 'body' , 'user_id'
    ]; 



    public function user() {

        return $this->belongsTo('App\User'); 

    }


    public function comments() {

        return $this->morphMany('App\Comment', 'commentable'); 
    }


    public function getType() {

        return 'App\Post'; 

    }

}
