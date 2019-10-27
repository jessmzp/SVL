<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDetallecompraTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('detallecompra', function(Blueprint $table)
		{
			$table->foreign('idarticulo', 'fk_detallecompra_articulo')->references('idarticulo')->on('articulo')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('idcompra', 'fk_detallecompra_compra')->references('idcompra')->on('compra')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('detallecompra', function(Blueprint $table)
		{
			$table->dropForeign('fk_detallecompra_articulo');
			$table->dropForeign('fk_detallecompra_compra');
		});
	}

}
