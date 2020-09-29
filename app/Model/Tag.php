<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function profiles()
    {
        return $this->belongsTo('App\Model\Profile');
    }
}
