<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table){
			$table->increments('id');
			$table->integer('id_branch')->references('id_branch')->on('branches')->onDelete('no action');//Sucursal
			$table->integer('id_role')->references('id')->on('roles')->onDelete('no action');//Rol
			$table->string('username')->unique();//Usuario
			$table->string('password'); //contraseña
			$table->string('name'); //Nombre del Usaurio
			$table->string('last_name'); // Apellido
			$table->date('date'); //Fecha
			$table->integer('phone'); //Telefono
			$table->string('email')->unique(); //Email
			$table->string('remember_token')->nullable(); //token de session
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
		Schema::drop('users');
	}

}
