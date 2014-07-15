<?php

\Schema::create('comments', function($table)
{
	$table->increments('id');
	$table->string('email');
	$table->text('message');
	
	$table->datetime('readed_at')->nullable();
	$table->timestamps();
});