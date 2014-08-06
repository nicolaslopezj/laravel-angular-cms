<?php

Route::group(['namespace' => 'Cms\Site\Controllers'], function() {

	Route::get('/', [
	'as' => 'site.home',
	'uses' => 'SiteController@home',
	]);

});