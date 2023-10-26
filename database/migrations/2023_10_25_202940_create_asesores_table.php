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
        Schema::create('asesores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_administrativo');
            $table->boolean('incubadora');
            $table->unsignedBigInteger('id_empleado');
            $table->timestamps();

            $table->foreign('id_administrativo')->references('id')->on('administrativos');
            $table->foreign('id_empleado')->references('id')->on('empleados');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asesores');
    }
};
