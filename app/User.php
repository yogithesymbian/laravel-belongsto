<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'country_id', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * hasMany # One to Many [2/6]
     */
    public function articles()
    {
        /**
         * where tb_User have the primary key
         * ?id
         * where tb_Article have the foreign key
         * ?user_id
         * where id = user_id AND
         * ?this from user to article
         */
        return $this->hasMany('App\Article');
    }
    public function komentars()
    {
        return $this->hasMany('App\Comment');
    }
    /**
     * hasOne # One to One [3/6]
     * this bad
     * ?todo
     *
     */
    public function address()
    {
        /**
         * where
         */
        return $this->hasOne('App\Address');
    }
    /**
     * belongsTo negatif address
     * fk_table to pk_table
     */
    public function country()
    {
        return $this->belongsTo('App\Country');
    }
    /**
     * many to many
     * skiping brief_table
     * use belongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
    /**
     * Polymorphism morphMan
     */
    public function comments()
    {
        return $this->morphMany('\App\Comment', 'commentable');
    }
}
