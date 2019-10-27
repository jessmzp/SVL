<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCategoriaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('categoria', function(Blueprint $table)
		{
			$table->foreign('iddepto', 'fk_categoria_departamento')->references('iddepto')->on('departamento')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('categoria', function(Blueprint $table)
		{
			$table->dropForeign('fk_categoria_departamento');
		});
	}

}
