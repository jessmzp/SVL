<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToArticuloTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('articulo', function(Blueprint $table)
		{
			$table->foreign('iddepto', 'fk_articulo_departamento')->references('iddepto')->on('departamento')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('idcategoria', 'fk_articulo_categoria')->references('idcategoria')->on('categoria')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('idsubcategoria', 'fk_articulo_subcategoria')->references('idsubcategoria')->on('subcategoria')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('articulo', function(Blueprint $table)
		{
			$table->dropForeign('fk_articulo_departamento');
			$table->dropForeign('fk_articulo_categoria');
			$table->dropForeign('fk_articulo_subcategoria');
		});
	}

}
