<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Allow multiassinging values for all exept guarded
    protected $guarded = array('id', 'created_at', 'updated_at');

    // Every post has a user
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // Every can have many comments
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

}
