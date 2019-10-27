<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDetallecompraTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('detallecompra', function(Blueprint $table)
		{
			$table->integer('iddetallecompra', true);
			$table->integer('idcompra');
			$table->integer('idarticulo');
			$table->integer('cantidad');
			$table->float('preciounitario', 10, 0);
			$table->float('descuento', 10, 0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('detallecompra');
	}

}
