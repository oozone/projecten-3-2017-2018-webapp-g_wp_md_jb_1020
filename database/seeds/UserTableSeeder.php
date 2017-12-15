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
	    $role_user = UserRole::where('role_name', 'user')->first();
	    $role_admin  = UserRole::where('role_name', 'admin')->first();
	    $role_official  = UserRole::where('role_name', 'official')->first();

	    // Common user
	    $user = new User();
	    $user->name = 'Pieter';
	    $user->email = 'pieter@gmail.com';
	    $user->password = bcrypt('secret');
	    $user->save();
	    $user->roles()->save($role_user);

	    // Admin
	    $user = new User();
	    $user->name = 'Matthias';
	    $user->email = 'matthias.vanooteghem@gmail.com';
	    $user->password = bcrypt('secret');
	    $user->save();
	    $user->roles()->save($role_admin);

	    // Official
	    $user = new User();
	    $user->name = 'Timo';
	    $user->email = 'timo@gmail.com';
	    $user->password = bcrypt('secret');
	    $user->save();
	    $user->roles()->save($role_official);


	    $user = new User();
	    $user->name = 'Referee';
	    $user->email = 'referee@voom.be';
	    $user->password = bcrypt('secret');
	    $user->save();
	    $user->roles()->save($role_official);

	    $user = new User();
	    $user->name = 'Lector HoGent';
	    $user->email = 'lector@hogent.be';
	    $user->password = bcrypt('DoYouEvenLaravel?');
	    $user->save();
	    $user->roles()->save($role_admin);


    }
}
