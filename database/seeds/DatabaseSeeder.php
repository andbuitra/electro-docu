<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call('EmployeesTableSeeder');         
         $this->call('DepartmentsTableSeeder');
         $this->call('UsersTableSeeder');
    }

}

class EmployeesTableSeeder extends Seeder{
    public function run(){
        DB::table('empleados')->insert([
            [
                'cedula' => '123', 
                'nombre' => 'Jhon', 
                'apellido' => 'Doe'
            ],
            [
                'cedula' => '456', 
                'nombre' => 'Jane', 
                'apellido' => 'Doe'
            ]
        ]);

    }
}

class UsersTableSeeder extends Seeder{
    public function run(){
        DB::table('usuarios')->insert([
            [
                'nombres' => 'John', 
                'apellidos' => 'Doe', 
                'cedula' => '123', 
                'email' => 'a@b.c', 
                'rol' => 'admin', 
                'verified' => '1', 
                'password' => bcrypt('asd'), 
                'vercode' => 'lolequisde', 
                'departamento_id' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => trim(Carbon::now()->format('Y-m-d H:i:s'))
            ],
            [
                'nombres' => 'Jane',            
                'apellidos' => 'Doe',
                'cedula' => '234', 
                'email' => 'b@b.c', 
                'rol' => 'admin', 
                'verified' => '1', 
                'password' => bcrypt('asd'), 
                'vercode' => 'lolequisde', 
                'departamento_id' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => trim(Carbon::now()->format('Y-m-d H:i:s'))

            ]
        ]);
    }
}

class DepartmentsTableSeeder extends Seeder{
    public function run(){
        DB::table('departamentos')->insert([
            [
                'name' => 'General'
            ],
            [
                'name' => 'Ventas'
            ],
            [
                'name' => 'Contabilidad'
            ],
            [
                'name' => 'Sistemas'
            ],
            [
                'name' => 'Subgerencia'
            ]
        ]);

    }
}
