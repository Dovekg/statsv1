<?php

namespace App;

use App\Http\Requests\Request;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Avatar;
use Bican\Roles\Traits\HasRoleAndPermission;
use Bican\Roles\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;
use Mpociot\Teamwork\Traits\UserHasTeams;

class User extends Authenticatable implements HasRoleAndPermissionContract
{
    use HasRoleAndPermission, UserHasTeams;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone'
    ];
    protected $appends = ['avatar'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getAvatarAttribute()
    {
        return Avatar::create(pinyin_abbr($this->name))->toBase64();
    }

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function bids()
    {
        return $this->hasMany('App\Bid');
    }

}
