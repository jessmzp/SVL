<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArticuloTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('articulo', function(Blueprint $table)
		{
			$table->integer('idarticulo', true);
			$table->integer('iddepto');
			$table->integer('idcategoria');
			$table->integer('idsubcategoria');
			$table->string('nomarticulo', 100);
			$table->text('descriparticulo');
			$table->float('precioarticulo', 10, 0);
			$table->integer('stockarticulo');
			$table->string('imagenarticulo', 100);
			$table->string('detallearticulo', 200);
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
		Schema::drop('articulo');
	}

}
