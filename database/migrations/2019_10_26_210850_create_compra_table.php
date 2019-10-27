<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompraTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('compra', function(Blueprint $table)
		{
			$table->integer('idcompra', true);
			$table->integer('idcliente');
			$table->dateTime('fechacompra');
			$table->string('tipo_comprobante', 20);
			$table->string('serie_comprobante', 7);
			$table->string('num_comprobante', 10);
			$table->float('impuesto', 10, 0);
			$table->float('total_venta', 10, 0);
			$table->string('estado', 20);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('compra');
	}

}
