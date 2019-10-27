<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMetodopagoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('metodopago', function(Blueprint $table)
		{
			$table->foreign('idcliente', 'fk_metodopago_cliente')->references('idcliente')->on('cliente')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('metodopago', function(Blueprint $table)
		{
			$table->dropForeign('fk_metodopago_cliente');
		});
	}

}
