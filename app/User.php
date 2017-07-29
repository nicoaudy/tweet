<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $appends = [
        'avatar',
    ];

    protected $fillable = [
        'username', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // change specify key from id to username | model binding
    public function getRouteKeyName()
    {
        return 'username';
    }

    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }

    public function getAvatar()
    {
        return 'https://www.gravatar.com/avatar/' . md5($this->email) . '?s=45&d=mm';
    }

    public function getAvatarAttribute()
    {
        return $this->getAvatar();
    }
}
