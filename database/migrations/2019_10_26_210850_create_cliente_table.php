<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClienteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cliente', function(Blueprint $table)
		{
			$table->integer('idcliente', true);
			$table->string('primernombre', 100);
			$table->string('segundonombre', 100)->nullable();
			$table->string('primerapellido', 100);
			$table->string('segundoapellido', 100)->nullable();
			$table->string('direccion', 70)->nullable();
			$table->string('telefono', 15)->nullable();
			$table->integer('sexo');
			$table->string('email', 50);
			$table->dateTime('fechacreacion');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cliente');
	}

}
