<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSubcategoriaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('subcategoria', function(Blueprint $table)
		{
			$table->foreign('idcategoria', 'fk_subcategoria_categoria')->references('idcategoria')->on('categoria')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('subcategoria', function(Blueprint $table)
		{
			$table->dropForeign('fk_subcategoria_categoria');
		});
	}

}
