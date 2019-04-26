<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::Where('name','user')->first();
		$role_admin = Role::Where('name','admin')->first();

		$user = new User();
		$user->name = 'User';
		$user->username = 'Usuario';
		$user->email = 'usuario@oplever.org.mx';
		$user->password = bcrypt('abc123');
		$user->save();
		$user->roles()->attach($role_user);


		$user = new User();
		$user->name = 'Admin';
		$user->username = 'Administrador';
		$user->email = 'admin@oplever.org.mx';
		$user->password = bcrypt('abc123');
		$user->save();
		$user->roles()->attach($role_admin);
    }
}
