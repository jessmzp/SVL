<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDepartamentoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('departamento', function(Blueprint $table)
		{
			$table->integer('iddepto', true);
			$table->string('nomdepto', 50);
			$table->string('descridepto', 256)->nullable();
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
		Schema::drop('departamento');
	}

}
