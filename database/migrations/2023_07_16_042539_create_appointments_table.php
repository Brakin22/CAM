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
        Schema::create('appointments', function (Blueprint $table) {
            $table->bigIncrements('id'); //antes era id()

            $table->date('scheduled_date');
            $table->time('scheduled_time');
            $table->string('type');
            $table->string('description');
            //Empleados
            $table->unsignedBigInteger('empleadu_id'); //era user_id y lo cambio a doctor_id
            $table->foreign('empleadu_id')->references('id')->on('users')->onDelete('cascade');

            //Empleados
            $table->unsignedBigInteger('usuario_id');//era user_id y lo cambio a patient_id
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');

            //Actividades
            $table->unsignedBigInteger('actividades_id');
            $table->foreign('actividades_id')->references('id')->on('actividades')->onDelete('cascade');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
