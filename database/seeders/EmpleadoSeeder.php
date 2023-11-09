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
            'puesto_empleado' => 3
        ]);

        DB::table('users')->insert([
            'nombre' => 'Lic. Eduardo Narvarez',
            'user' => 'Eduardo Narvaez',
            'password' => Hash::make('123'),
            'estado' => true,
            'puesto_empleado' => 6
        ]);

        DB::table('users')->insert([
            'nombre' => 'Raul',
            'user' => 'Raul',
            'password' => Hash::make('123'),
            'estado' => true,
            'puesto_empleado' => 6
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

        DB::table('analistas')->insert([
            'id_user' => 4          
        ]);

        DB::table('analistas')->insert([
            'id_user' => 5          
        ]);

        DB::table('ventas')->insert([
            'id_asesor' => 1,
            'estado_venta' => 2,
            'id_analista' => 1,
            'linea_venta' => 8180922794,
            'nombre_cliente' => 'Yo mero',
            'plan_venta' => 'MAX 100',
            'meses_venta' => 18,
            'marca_equipo' => 'samsung',
            'modelo_equipo' => 'a10',
            'id_equipo' => null,
            'id_ruta' => null,
            'calle_entrega' => 'ebano',
            'numero_entrega' => '879',
            'colonia_entrega' => '879',
            'municipio_entrega' => 'juarez',
            'referencia_entrega' => '879',
            'url_maps' => 'https://www.google.com',
            'total_mensual' => '200',
            'notas_vendedor' => 'si',
            'notas_MC' => null,
            'id_zona' => null,
            'fecha_venta' => now()
        ]);
    }
}
