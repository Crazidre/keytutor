<?php

namespace App;

use Cog\Contracts\Love\Liker\Models\Liker as LikerContract;
use Cog\Laravel\Love\Liker\Models\Traits\Liker;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cviebrock\EloquentSluggable\Sluggable;

class User extends Authenticatable implements LikerContract
{
    use Notifiable;

    use liker; 

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
                'source' => 'name'
            ]
        ];
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'provider' , 'provider_id' , 'bio' , 'slug'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function purchases() {

        return $this->hasMany('App\Buyers'); 

    }


    public function videos() {


        return $this->hasMany('App\Video'); 

    }


    public function notes() {

        return $this->hasMany('App\Note'); 

    }

    public function transactions() {


        return $this->hasMany('App\Transaction'); 

    }


    public function comments() {

        return $this->hasMany('App\Comment'); 


    }

    public function getRouteKeyName()
{
    return 'slug';
}


    public function posts() {

        return $this->hasMany('App\Post'); 

    }



}
