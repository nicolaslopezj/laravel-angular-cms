<?php namespace Cms\Events;

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

class EventsServiceProvider extends ServiceProvider {

	public function boot()
	{
		// Register Events
	}

	public function register()
	{
		\Event::subscribe('Cms\Events\Crud\PublicViewsEventHandler');
		\Event::subscribe('Cms\Events\Crud\PublicRoutesEventHandler');
		\Event::subscribe('Cms\Events\Crud\EntitiesEventHandler');
		\Event::subscribe('Cms\Events\Crud\EntityAttributesEventHandler');
	}

}