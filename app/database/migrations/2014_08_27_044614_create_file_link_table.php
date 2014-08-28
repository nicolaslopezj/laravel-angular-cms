<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFileLinkTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('file_link', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('file_id')->unsigned();
			$table->foreign('file_id')->references('id')->on('files')->onDelete('cascade');
			$table->string('name');
			$table->string('token');
			$table->datetime('expires_on')->nullable();
			$table->integer('downloads');
			$table->integer('max_downloads')->nullable();
			$table->string('title');
			$table->text('description');
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
		Schema::drop('file_link');
	}

}
