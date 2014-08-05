<?php

Route::group(['namespace' => 'Cms\Site\Controllers'], function() {

	Route::get('caca', [
	'as' => 'site.ico',
	'uses' => 'SiteController@ico',
	]);

});