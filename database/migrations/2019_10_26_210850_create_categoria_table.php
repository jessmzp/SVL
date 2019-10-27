<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoriaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categoria', function(Blueprint $table)
		{
			$table->integer('idcategoria', true);
			$table->integer('iddepto');
			$table->string('nomcategoria', 50);
			$table->string('descricategoria', 256)->nullable();
			$table->boolean('estado');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('categoria');
	}

}
