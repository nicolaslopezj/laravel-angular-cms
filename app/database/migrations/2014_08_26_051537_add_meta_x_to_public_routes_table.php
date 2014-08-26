<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddMetaXToPublicRoutesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('public_routes', function(Blueprint $table)
		{
			$table->string('meta_title');
			$table->text('meta_description');
			$table->string('meta_image');
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
			$table->dropColumn('meta_title');
			$table->dropColumn('meta_description');
			$table->dropColumn('meta_image');
		});
	}

}
