<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddSlugToEntitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('entities', function(Blueprint $table)
		{
			$table->boolean('has_slug');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('entities', function(Blueprint $table)
		{
			$table->dropColumn('has_slug');
		});
	}

}
