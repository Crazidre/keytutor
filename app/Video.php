<?php

namespace App;


use Cog\Contracts\Love\Likeable\Models\Likeable as LikeableContract;
use Cog\Laravel\Love\Likeable\Models\Traits\Likeable;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Video extends Model implements LikeableContract
{
    use likeable; 
    
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

    protected $fillable = [

    'youtube_link' , 'title' , 'description' , 'file' , 'slug' , 

    'user_id' , 'price'

    ];


    public function getRouteKeyName()
{
    return 'slug';
}


    public function buyers() {

        return $this->morphMany('App\Buyer' , 'buyable'); 

    }


    public function getType() {

        return 'App\Post'; 

    }


}
