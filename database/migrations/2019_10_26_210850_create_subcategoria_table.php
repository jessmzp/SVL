<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubcategoriaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subcategoria', function(Blueprint $table)
		{
			$table->integer('idsubcategoria', true);
			$table->integer('idcategoria');
			$table->string('nomsubcategoria', 50);
			$table->string('descrisubcategoria', 256)->nullable();
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
		Schema::drop('subcategoria');
	}

}
