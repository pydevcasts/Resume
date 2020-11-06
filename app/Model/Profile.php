<?php

namespace App\Model;
use App\Model\Tag;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{


    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_profiles')->withTimestamps();
    }

    public function users()
    {
        return $this->belongsTo('App\User');
    }

}
