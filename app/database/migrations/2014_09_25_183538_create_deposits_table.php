<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepositsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('deposits',function(Blueprint $table){
			$table->increments('id');
			$table->integer('id_income')->references('id')->on('incomes')->onDelete('no action');//Sucursal
			$table->integer('number_deposit');
			$table->double('deposit_amount');
			$table->integer('deposit_type');
			$table->string('record_number');//Numeor de Ficha
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
		Schema::drop('deposits');
	}

}
