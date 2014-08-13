<?php namespace Cms\Events\Crud;

class PublicRoutesEventHandler {

    public function onCreate($public_route)
    {
        $coder = new \Cms\Library\Helpers\Coder\RoutesCoder;
        $coder->codeRoutes();
    }

    public function onUpdate($public_route)
    {
        $coder = new \Cms\Library\Helpers\Coder\RoutesCoder;
        $coder->codeRoutes();
    }

    public function onDelete()
    {
        $coder = new \Cms\Library\Helpers\Coder\RoutesCoder;
        $coder->codeRoutes();
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $events
     * @return array
     */
    public function subscribe($events)
    {
        $events->listen('public_routes.created', 'Cms\Events\Crud\PublicRoutesEventHandler@onCreate');
        $events->listen('public_routes.updated', 'Cms\Events\Crud\PublicRoutesEventHandler@onUpdate');
        $events->listen('public_routes.deleted', 'Cms\Events\Crud\PublicRoutesEventHandler@onDelete');
    }

}