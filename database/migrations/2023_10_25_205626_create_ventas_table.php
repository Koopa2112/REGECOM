<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_asesor');
            $table->integer('estado_venta');
            $table->unsignedBigInteger('id_analista');
            $table->bigInteger('linea_venta');
            $table->string('nombre_cliente', 50);
            $table->string('plan_venta', 10);
            $table->integer('meses_venta');
            $table->text('marca_equipo');
            $table->text('modelo_equipo');
            $table->unsignedBigInteger('id_equipo')->nullable();
            $table->unsignedBigInteger('id_ruta')->nullable();
            $table->string('calle_entrega', 50);
            $table->string('numero_entrega', 50);
            $table->string('municipio_entrega', 50);
            $table->string('colonia_entrega', 50);
            $table->string('referencia_entrega', 250);
            $table->string('url_maps', 100);
            $table->double('total_mensual');
            $table->text('notas_vendedor', 100)->nullable();
            $table->text('notas_MC', 100)->nullable();
            $table->unsignedBigInteger('id_zona')->nullable();
            $table->date('fecha_venta');
            $table->timestamps();
            $table->string('repartidor', 50);
            $table->unsignedBigInteger('id_acuse');

            $table->foreign('id_asesor')->references('id')->on('asesores');
            $table->foreign('id_analista')->references('id')->on('analistas');
            $table->foreign('id_equipo')->references('id')->on('equipos');
            $table->foreign('id_ruta')->references('id')->on('rutas');
            $table->foreign('id_zona')->references('id')->on('zonas');
            $table->foreign('id_acuse')->references('id')->on('acuses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
