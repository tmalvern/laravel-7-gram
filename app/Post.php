<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Post extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy('created_at', 'ASC');
    }

    public function createdWhen($createdAt)
    {
        $now = Carbon::now();
        $created_at = Carbon::parse($createdAt);      

        return Carbon::now()->subMinutes($created_at->diffInMinutes($now))->diffForHumans();
    }
}
