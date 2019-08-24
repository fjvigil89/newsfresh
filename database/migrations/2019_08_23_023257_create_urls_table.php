<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUrlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('urlAcotada');
            $table->text('urlOriginal');
            $table->integer('visitas');
            $table->string('titulo',255);            
            $table->boolean("activo")->default(true);
            $table->unsignedInteger('categoria_id');
            $table->unsignedInteger('user_id');
            //$table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('urls');
    }
}
