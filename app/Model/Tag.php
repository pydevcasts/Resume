<?php

namespace App\Model;
use App\Model\Profile;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
   
    public function profiles()
    {
        return $this->belongsToMany(Profile::class, 'profile_tags')->withTimestamps();
    }
}
