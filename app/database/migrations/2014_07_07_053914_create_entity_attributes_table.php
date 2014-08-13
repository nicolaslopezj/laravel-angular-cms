<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEntityAttributesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('entity_attributes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('entity_id')->unsigned();
			$table->foreign('entity_id')->references('id')->on('entities')->onDelete('cascade');
			$table->string('name');
			$table->string('description');
			$table->string('type');
			$table->text('options');
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
		Schema::drop('entity_attributes');
	}

}
