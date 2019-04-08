<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    // protected $table = 'countries';
    // protected $fillable = ['id', 'name'];

    /**
     * HasManyThrough
     * from country->users->articles
     */
    public function articles()
    {
        return $this->hasManyThrough('App\Article', 'App\User', 'country_id', 'user_id');
    }

    public function comments()
    {
        return $this->hasManyThrough('App\Comment', 'App\User', 'country_id', 'user_id');
    }
    // public function comments()
    // {
    //     return $this->morphMany('App\Comment', 'commentable');
    // }
}
