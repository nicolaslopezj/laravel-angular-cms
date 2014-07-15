<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDefinitionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('definitions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('identifier')->unique();
			$table->string('description');
			$table->enum('type', ['string', 'text', 'integer', 'image']);
			$table->boolean('editable');

			$table->string('string')->nullable();
			$table->text('text')->nullable();
			$table->integer('integer')->nullable();
			$table->integer('image_id')->unsigned()->nullable();
			$table->foreign('image_id')->references('id')->on('images')->onDelete('cascade');
			
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
		Schema::drop('definitions');
	}

}
