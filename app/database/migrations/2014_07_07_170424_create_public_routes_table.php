<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePublicRoutesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('public_routes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('path');
			$table->string('controller');
			$table->string('template');
			$table->text('resolve');

			$table->string('tag')->nullable();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('public_routes');
	}

}
