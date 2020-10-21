<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $fillable =['tag_name'];
    public function profile()
    {
        return $this->belongsTo('App\Model\Profile' , 'tag_id' , 'id');
    }
}
