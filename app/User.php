<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

	public function matches()
	{
		return $this->belongsToMany(Match::class);
	}

	public function roles()
	{
		return $this->belongsToMany(UserRole::class);
	}

	public function isAdmin()
	{
		$role = $this->roles()->where('user_role_id', 2)->first();
		return $role;
		//return $role->count();
	}

}
