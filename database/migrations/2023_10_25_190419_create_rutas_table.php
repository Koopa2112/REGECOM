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
        Schema::create('rutas', function (Blueprint $table) {
            $table->id();
            $table->integer('num_entregas' );
            $table->integer('max_entregas');
            $table->unsignedBigInteger('id_zona');
            $table->date('fecha_entrega');
            $table->timestamps();

            $table->foreign('id_zona')->references('id')->on('zonas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rutas');
    }
};
