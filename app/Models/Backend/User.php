<?php

namespace App\Models\Backend;

use App\Traits\Friendable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Auth;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Auth
{
    use HasApiTokens, Notifiable, Friendable;

    protected $fillable = ['privilege', 'first_name', 'last_name', 'username', 'email', 'password', 'image', 'phone'];

    public function privileges()
    {
        return $this->belongsToMany('App\Models\Backend\Privilege',
            'privilege_user', 'user_id',
            'privilege_id', 'id');
    }

    public function findforPassport($username)
    {
        return $this->where('username', $username)->first();
    }

    public function visitingCards()
    {
        return $this->hasOne(VisitingCard::class);
    }

    public function cardShared()
    {
        return $this->hasMany(CardShared::class, 'friend_id');
    }

    public function userInfos()
    {
        return $this->hasOne(UserInfo::class, 'user_id');
    }
}


