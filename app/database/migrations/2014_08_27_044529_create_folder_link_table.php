<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFolderLinkTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('folder_link', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('path');
			$table->string('name');
			$table->string('token');
			$table->datetime('expires_on')->nullable();
			$table->integer('downloads');
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
		Schema::drop('folder_link');
	}

}
