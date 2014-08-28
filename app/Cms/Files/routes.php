<?php

Route::group(['namespace' => 'Cms\Files\Controllers'], function() {

	Route::get('p/{name}', [
		'as' => 'files.path.show',
		'uses' => 'FoldersController@show',
	]);

	Route::get('download/{id}/p/{token}', [
		'as' => 'files.path.download',
		'uses' => 'FoldersController@download',
	]);

	Route::get('f/{name}', [
		'as' => 'files.file.show',
		'uses' => 'FilesController@show',
	]);

	Route::get('download/{id}/f/{token}', [
		'as' => 'files.file.download',
		'uses' => 'FilesController@download',
	]);

	

});