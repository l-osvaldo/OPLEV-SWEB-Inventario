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
		$role_admin = Role::Where('name','admin')->first();

		$user = new User();
		$user->nombre = 'Administrador';
		$user->username = 'admin';
		$user->cargo = 'DESARROLLADOR';
		$user->id_area = '12';
		$user->area = 'UNIDAD TÉCNICA DE SERVICIOS INFORMÁTICOS';
		$user->email = 'admin@oplever.org.mx';
		$user->password = bcrypt('abc123');
		$user->save();
		$user->roles()->attach($role_admin);
    }
}
