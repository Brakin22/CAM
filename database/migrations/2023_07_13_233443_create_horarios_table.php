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
        Schema::create('horarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedSmallInteger('day');
            $table->boolean('active');
            $table->time('morning_start'); //Se almacena el horario de la mañana
            $table->time('morning_end'); //Se almacena la hora que termina de la mañana 
            
            $table->time('afternoon_start');
            $table->time('afternoon_end');

            $table->unsignedBigInteger('user_id'); //
            $table->foreign('user_id')->references('id')->on('users'); //Relacion foranea con respecto a la columna user:id con referencia al campo id de la tabla users

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios');
    }
};
