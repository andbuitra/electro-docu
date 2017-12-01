<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class usuarioseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('usuarios')-> insert([
          'nombres'=>'Pedro Maria',
          'apellidos'=>'Murcia Guzman',
          'cedula'=>'10903421',
          'email'=>'pedro@hotmail.com',
          'rol'=>'admin',
          'vercode'=>'ert',
          'verified'=>'1',
          'password'=>'1234',
      ]);
        DB::table('usuarios')-> insert([
          'nombres'=>'Eduardo Jose',
          'apellidos'=>'Zapata Guzman',
          'cedula'=>'10908761',
          'email'=>'eduajos@hotmail.com',
          'vercode'=>'ert',
          'verified'=>'1',
          'password'=>'1234',
        ]);
        DB::table('usuarios')-> insert([
          'nombres'=>'Jose Federico',
          'apellidos'=>'Sanchez Sanchez',
          'cedula'=>'10908763',
          'email'=>'josefed@hotmail.com',
          'vercode'=>'ert',
          'verified'=>'1',
          'password'=>'1234',
        ]);
        DB::table('usuarios')-> insert([
          'nombres' =>'Laura Valentina',
          'apellidos'=>'Marquez Galviz',
        'cedula' =>'10908711',
          'email'=>'valen@hotmail.com',
          'vercode'=>'ert',
          'verified'=>'1',
          'password'=>'1234',
        ]);
        DB::table('usuarios')-> insert([
          'nombres'=>'Jose Andres',
          'apellidos'=>'Hernandez Florez',
          'cedula'=>'10908701',
          'email'=>'joseandres@hotmail.com',
          'vercode'=>'ert',
          'verified'=>'1',
          'password'=>'1234',
        ]);
        DB::table('usuarios')-> insert([
          'nombres'=>'Andres',
          'apellidos'=>'Buitrago',
          'cedula'=>'10908461',
          'email'=>'Andresbuitrago@hotmail.com',
          'vercode'=>'ert',
          'verified'=>'1',
          'password'=>'1234',
        ]);
        DB::table('usuarios')-> insert([
          'nombres'=>'Brenda Maria',
          'apellidos'=>'Gelves ',
          'cedula'=>'10908721',
          'email'=>'brenda@hotmail.com',
          'vercode'=>'ert',
          'verified'=>'1',
          'password'=>'1234',
        ]);
    }
}
