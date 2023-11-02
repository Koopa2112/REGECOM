<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illluminate\Support\Str;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'nombre' => 'Jesus Angel Reyes',
            'user' => 'Jesus Reyes',
            'password' => Hash::make('password'),
            'estado' => true,
            'puesto_empleado' => 0
        ]);

        DB::table('users')->insert([
            'nombre' => 'Raziel Ramirez ',
            'user' => 'Raziel Ramirez',
            'password' => Hash::make('passw'),
            'estado' => true,
            'puesto_empleado' => 1
        ]);

        DB::table('users')->insert([
            'nombre' => 'Karla Palomo T',
            'user' => 'Karla Palomo',
            'password' => Hash::make('123'),
            'estado' => true,
            'puesto_empleado' => 2
        ]);

        DB::table('administrativos')->insert([
            'id_user' => 1          
        ]);

        DB::table('administrativos')->insert([
            'id_user' => 2            
        ]);

        DB::table('asesores')->insert([
            'id_administrativo' => 2, 
            'incubadora' => false,  
            'id_user' => 3            
        ]);
    }
}
