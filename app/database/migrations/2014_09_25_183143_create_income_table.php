<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncomeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('incomes', function(Blueprint $table){
			$table->increments('id');
			$table->string('id_branch')->references('id_branch')->on('branches')->onDelete('no action');//Sucursal
			$table->date('date');
			$table->double('total_sale');
			$table->double('voucher_sale');
			$table->double('orfis_sale');
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
		Schema::drop('incomes');
	}

}
