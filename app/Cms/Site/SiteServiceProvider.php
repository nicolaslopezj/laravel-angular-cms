<?php namespace Cms\Site;

/*
|--------------------------------------------------------------------------
| Public Service Provider
|--------------------------------------------------------------------------
|
| All register all the things related to publc here, like route and 
| listeners.
|
*/

use Illuminate\Support\ServiceProvider;
use Route;

class SiteServiceProvider extends ServiceProvider {

	public function boot()
	{
		// Register Routes
		try {
			include 'routes.php';
		} catch (\Exception $e) {
			
		}
	}

	public function register()
	{
		
	}

}