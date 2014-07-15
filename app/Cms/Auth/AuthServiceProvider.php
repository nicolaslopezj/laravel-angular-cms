<?php namespace Cms\Auth;

/*
|--------------------------------------------------------------------------
| Admin Service Provider
|--------------------------------------------------------------------------
|
| All register all the things related to admin here, like route and 
| listeners.
|
*/

use Illuminate\Support\ServiceProvider;
use Route;

class AuthServiceProvider extends ServiceProvider {

	public function boot()
	{
		// Register Routes
		include 'routes.php';
	}

	public function register()
	{
		
	}

}