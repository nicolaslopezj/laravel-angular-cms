<?php

Route::group(['namespace' => 'Cms\Site\Controllers'], function() {

	Route::get('/', [
	'as' => 'site.index',
	'uses' => 'SiteController@index',
	]);

});