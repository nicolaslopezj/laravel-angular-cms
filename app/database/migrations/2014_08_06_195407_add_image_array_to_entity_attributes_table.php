<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddImageArrayToEntityAttributesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('entity_attributes', function(Blueprint $table)
		{
			DB::statement("ALTER TABLE entity_attributes MODIFY COLUMN type ENUM('string', 'text', 'integer', 'image', 'image_array')");
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
			DB::statement("ALTER TABLE entity_attributes MODIFY COLUMN type ENUM('string', 'text', 'integer', 'image')");
		});
	}

}
