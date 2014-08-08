<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class DropNameUniqueOnEntityAttributesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('entity_attributes', function(Blueprint $table)
		{
			$table->dropUnique('entity_attributes_name_unique');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('entity_attributes', function(Blueprint $table)
		{
			$table->unique('name');
		});
	}

}
