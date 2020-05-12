<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function profileImage()
    {
        return '/storage/'.($this->image ? $this->image :  'profile/JKr9CdvLgO9WCxBl4P6HswLLRoxmabwz9kLc5nxu.jpeg');
    }    

    public function user()
    {   
        return $this->belongsTo(User::class);
    }

    public function followers()
    {
        return $this->belongsToMany(User::class);
    }

}
