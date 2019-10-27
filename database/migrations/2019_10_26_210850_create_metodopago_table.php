<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMetodopagoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('metodopago', function(Blueprint $table)
		{
			$table->integer('idmetodopago', true);
			$table->integer('idcliente');
			$table->string('numerotarjeta', 50);
			$table->string('tarjetahabiente', 50);
			$table->string('fechaexpiracion', 50);
			$table->integer('cvv');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('metodopago');
	}

}
