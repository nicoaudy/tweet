<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $appends = [
        'avatar',
        'profileUrl'
    ];

    protected $fillable = [
        'username', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }

    public function isNot(User $user)
    {
        return $this->id !== $user->id;
    }

    public function isFollowing(User $user)
    {
        return (bool) $this->following->where('id', $user->id)->count();
    }

    public function canFollow(User $user)
    {
        if (!$this->isNot($user)) {
            return false;
        }

        return !$this->isFollowing($user);
    }

    public function following()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'follower_id');
    }

    public function getAvatar()
    {
        return 'https://www.gravatar.com/avatar/' . md5($this->email) . '?s=45&d=mm';
    }

    /*
    *  Accessor
    *  ...Atribute() is creating accessor to appends
    */
    public function getAvatarAttribute()
    {
        return $this->getAvatar();
    }

    public function getProfileUrlAttribute()
    {
        return route('user.index', $this);
    }

    /*
    *  change specify key from id to username | model binding
    */
    public function getRouteKeyName()
    {
        return 'username';
    }
}
