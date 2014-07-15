<?php namespace Cms\Dev;

/*
|--------------------------------------------------------------------------
| Dev Service Provider
|--------------------------------------------------------------------------
|
| All register all the things related to admin here, like route and 
| listeners.
|
*/

use Illuminate\Support\ServiceProvider;
use Route;

class DevServiceProvider extends ServiceProvider {

	public function boot()
	{
		// Register Routes
		include 'routes.php';
	}

	public function register()
	{
		
	}

}