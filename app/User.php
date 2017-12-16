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

    // User and matches: manytomany
	public function matches()
	{
		return $this->belongsToMany(Match::class);
	}

	// User and roles: manytomany
	public function roles()
	{
		return $this->belongsToMany(UserRole::class);
	}

	/*
	 * Helper functions
	 */
	public function isAdmin()
	{
		$role = $this->roles()->where('user_role_id', 2)->first();
		return $role;
		//return $role->count();
	}

}
