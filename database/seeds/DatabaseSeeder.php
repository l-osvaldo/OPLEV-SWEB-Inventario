<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //la creacion de datos de roles debe ejecutarse primero
      $this->call(RoleTableSeeder::class);

      //Los usuarios necesitaran los roles previamente generados
      $this->call(UserTableSeeder::class);
    }
}
