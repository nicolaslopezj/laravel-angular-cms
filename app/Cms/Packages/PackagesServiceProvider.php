<?php namespace Cms\Packages;

/*
|--------------------------------------------------------------------------
| Events Service Provider
|--------------------------------------------------------------------------
|
| All register all the things related to admin here, like route and 
| listeners.
|
*/

use Illuminate\Support\ServiceProvider;
use Route;

class PackagesServiceProvider extends ServiceProvider {

	public function boot()
	{
		foreach (\PackagesHelper::listPackages() as $index => $package) {
			$main = '\Cms\Packages\Source\\' . $package . '\Main';
			$main::boot();
		}
		

		Route::group(['prefix' => 'dev', 'namespace' => 'Cms\Packages\Source', 'before' => 'auth'], function()
		{
			foreach (\PackagesHelper::listPackages() as $index => $package) {
				$main = '\Cms\Packages\Source\\' . $package . '\Main';
				if (method_exists($main, 'devRoutes')) {
					$main::devRoutes();
				}
			}
		});

		Route::group(['prefix' => 'admin', 'namespace' => 'Cms\Packages\Source', 'before' => 'auth'], function()
		{
			foreach (\PackagesHelper::listPackages() as $index => $package) {
				$main = '\Cms\Packages\Source\\' . $package . '\Main';
				if (method_exists($main, 'adminRoutes')) {
					$main::adminRoutes();
				}
			}
		});

		Route::group(['prefix' => 'me', 'namespace' => 'Cms\Packages\Source', 'before' => 'auth'], function()
		{
			foreach (\PackagesHelper::listPackages() as $index => $package) {
				$main = '\Cms\Packages\Source\\' . $package . '\Main';
				if (method_exists($main, 'userRoutes')) {
					$main::userRoutes();
				}
			}
		});
	}

	public function register()
	{
		foreach (\PackagesHelper::listPackages() as $index => $package) {
			$main = '\Cms\Packages\Source\\' . $package . '\Main';
			if (method_exists($main, 'register')) {
				$main::register();
			}
		}
	}

}