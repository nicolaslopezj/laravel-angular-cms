<?php namespace Cms\Commands;

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

class CommandsServiceProvider extends ServiceProvider {

	public function boot()
	{
		$this->app['cms.deploy'] = $this->app->share(function($app)
        {
            return new DeployCommand;
        });

        $this->commands('cms.deploy');
	}

	public function register()
	{
		
	}

}