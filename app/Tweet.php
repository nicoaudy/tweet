<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $fillable = [
        'body'
    ];

    protected $appends = [
        'humanCreatedAt'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getHumanCreatedAtAttribute()
    {
        return $this->created_at->diffForHumans();
    }
}
