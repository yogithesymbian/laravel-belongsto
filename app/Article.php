<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{


    # One to Many [1/6]
    public function user()
    {
        /**
         * where tb_Article have the foreign key
         * ?user_id
         * where tb_User have the primary key
         * ?id
         * where id = user_id AND
         * ?this from article to user
         */
        return $this->belongsTo('App\User');
    }
    /**
     * Polymorphism morphMany
     */
    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
}
