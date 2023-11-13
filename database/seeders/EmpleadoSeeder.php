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
            'user' => 'admin',                  //1
            'password' => Hash::make('123'),
            'estado' => true,
            'puesto_empleado' => 0
        ]);

        DB::table('users')->insert([
            'nombre' => 'Raziel Ramirez ',
            'user' => 'Supervisor',
            'password' => Hash::make('123'),       //2
            'estado' => true,
            'puesto_empleado' => 1
        ]);
        
        DB::table('users')->insert([
            'nombre' => 'Marcelo',
            'user' => 'Calidad',
            'password' => Hash::make('123'),       //3
            'estado' => true,
            'puesto_empleado' => 2
        ]);

        DB::table('users')->insert([
            'nombre' => 'Karla',
            'user' => 'Asesor',
            'password' => Hash::make('123'),    //4
            'estado' => true,
            'puesto_empleado' => 3
        ]);
        

        DB::table('users')->insert([
            'nombre' => 'Jonathan',
            'user' => 'Logistica',
            'password' => Hash::make('123'),    //5
            'estado' => true,
            'puesto_empleado' => 4
        ]);

        DB::table('users')->insert([
            'nombre' => 'Sergio',
            'user' => 'Almacén',
            'password' => Hash::make('123'),    //6
            'estado' => true,
            'puesto_empleado' => 5
        ]);

        
        DB::table('users')->insert([
            'nombre' => 'Lic. Eduardo Narvarez',
            'user' => 'Analista',
            'password' => Hash::make('123'),    //7
            'estado' => true,
            'puesto_empleado' => 6
        ]);

        DB::table('users')->insert([
            'nombre' => 'Raul',
            'user' => 'Analista',
            'password' => Hash::make('123'),    //8
            'estado' => true,
            'puesto_empleado' => 6
        ]);

        DB::table('users')->insert([
            'nombre' => 'Adrian',
            'user' => 'Asesor2',
            'password' => Hash::make('123'),    //9
            'estado' => true,
            'puesto_empleado' => 3
        ]);



        DB::table('administrativos')->insert([
            'id_user' => 1          
        ]);

        DB::table('administrativos')->insert([
            'id_user' => 2            
        ]);

        DB::table('administrativos')->insert([
            'id_user' => 3           
        ]);

        DB::table('administrativos')->insert([
            'id_user' => 5          
        ]);

        DB::table('administrativos')->insert([
            'id_user' => 6            
        ]);

        DB::table('asesores')->insert([
            'id_administrativo' => 2, 
            'incubadora' => false,  
            'id_user' => 4            
        ]);

        DB::table('asesores')->insert([
            'id_administrativo' => 1, 
            'incubadora' => true,  
            'id_user' => 9            
        ]);

        DB::table('analistas')->insert([
            'id_user' => 7          
        ]);

        DB::table('analistas')->insert([
            'id_user' => 8          
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
