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
        Schema::create('song', function (Blueprint $table) {
            $table->id();                                   
            $table->string('title', 80)->unique();         
            $table->foreignId('idPlayer');              
            $table->time('duration')->nullable();           
            $table->string('genre', 20);                    
            $table->foreignId('idAlbum')->nullable();                
            $table->smallInteger('order')->nullable();      
            $table->date('date');                     
            $table->timestamps();
            $table->foreign('idPlayer')->references('id')->on('player')->onDelete('cascade');
            $table->foreign('idAlbum')->references('id')->on('album')->nullOnDelete('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('song');
    }
};
