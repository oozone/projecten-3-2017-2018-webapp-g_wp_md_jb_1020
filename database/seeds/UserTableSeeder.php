<?php

use App\User;
use App\UserRole;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $role_user = UserRole::where('name', 'user')->first();
	    $role_admin  = UserRole::where('name', 'admin')->first();
	    $role_official  = UserRole::where('name', 'official')->first();

	    // Common user
	    $user = new User();
	    $user->name = 'Pieter';
	    $user->email = 'pieter@gmail.com';
	    $user->password = bcrypt('secret');
	    $user->user_role_id = $role_user->id;
	    $user->save();

	    // Admin
	    $user = new User();
	    $user->name = 'Matthias';
	    $user->email = 'matthias.vanooteghem@gmail.com';
	    $user->password = bcrypt('secret');
	    $user->user_role_id = $role_admin->id;
	    $user->save();

	    // Official
	    $user = new User();
	    $user->name = 'Timo';
	    $user->email = 'timo@gmail.com';
	    $user->password = bcrypt('secret');
	    $user->user_role_id = $role_official->id;
	    $user->save();
	
    }
}
