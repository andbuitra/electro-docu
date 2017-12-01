<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(EmployeesFactory::class);


    }
}

class UsersTableSeeder extends Seeder{
    public function run(){
        DB::table('usuarios')->delete();

        DB::table('usuarios')->insert(array(
            array('nombres' => 'John', 'apellidos' => 'Doe', 'cedula' => '123', 'email' => 'a@b.c', 'rol' => 'admin', 'verified' => '1', 'password' => 'abc', 'vercode' => 'lolequisde')
        ));

    }
}

class DepartmentsTableSeeder extends Seeder{
    public function run(){
        DB::table('departamentos')->delete();

        DB::table('departamentos')->insert(array(
            array('name' => 'General'),
            array('name' => 'Ventas'),
            array('name' => 'Contabilidad'),
            array('name' => 'Sistemas'),
            array('name' => 'Subgerencia')
        ));

    }
}
