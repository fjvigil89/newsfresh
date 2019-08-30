<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password'); 
            $table->string('identidad');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('pais');
            $table->string('estado');
            $table->string('ciudad');
            $table->string('tipo_cuenta')->default('Ninguna')->nulleable();
            $table->string('numero_cuenta')->unique()->nulleable();            
            $table->string("rol",13)->default('user');  
            $table->string('ranking',15)->default('novato');     
            $table->boolean("activo")->default(true);
            $table->unsignedInteger('noticia_id')->nullable(); 
            $table->rememberToken();            
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
        Schema::dropIfExists('users');
    }
}
