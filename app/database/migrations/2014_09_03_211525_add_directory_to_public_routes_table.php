<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddDirectoryToPublicRoutesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('public_routes', function(Blueprint $table)
		{
			$table->text('directory');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('public_routes', function(Blueprint $table)
		{
			$table->dropColumn('directory');
		});
	}

}
