<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public function tags()
    {
        return $this->hasMany('App\Model\Tag', 'profile_id');
    }
    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
