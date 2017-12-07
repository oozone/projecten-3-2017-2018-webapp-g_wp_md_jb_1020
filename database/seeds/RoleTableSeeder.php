<?php

use App\UserRole;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $role_commonuser = new UserRole();
	    $role_commonuser->role_name = 'user';
	    $role_commonuser->save();

	    $role_admin = new UserRole();
	    $role_admin->role_name = 'admin';
	    $role_admin->save();

	    $role_official = new UserRole();
	    $role_official->role_name = 'official';
	    $role_official->save();

    }
}
