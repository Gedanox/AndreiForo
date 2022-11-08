<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cancion', function (Blueprint $table) {
            $table->id();                                   //primary key id autonumerico
            $table->string('titulo', 80)->unique();         //titulo
            $table->string('interprete', 100);              //interprete
            $table->string('autor', 100)->nullable();       //autor
            $table->time('duracion')->nullable();           //duracion
            $table->string('genero', 20);                   //genero
            $table->string('album', 70)->nullable();        //album
            $table->smallInteger('orden')->nullable();      //numero del album
            $table->date('fechapubli');                     //fecha publicacion
            $table->timestamps();                           //2 campos con marca de tiempo(creacion y edicion)
            $table->unique(['album','orden']);              //combinacion de dos columnas unicas
            //foreign keys
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cancion');
    }
};
