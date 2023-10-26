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
        DB::table('empleados')->insert([
            'nombre' => 'Jesus Angel Reyes',
            'nombre_empleado' => 'Jesus Reyes',
            'password' => Hash::make('password'),
            'estado' => true,
            'puesto_empleado' => 0
        ]);
    }
}
