<?php namespace Cms\Events\Crud;

class PublicViewsEventHandler {

    public function onCreate($public_view)
    {
        $coder = new \Cms\Library\Helpers\Coder\ViewsCoder;
        $coder->codeViews();
    }

    public function onUpdate($public_view)
    {
        $coder = new \Cms\Library\Helpers\Coder\ViewsCoder;
        $coder->codeViews();
    }

    public function onDelete($public_view)
    {
        $coder = new \Cms\Library\Helpers\Coder\ViewsCoder;
        $coder->codeViews();
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $events
     * @return array
     */
    public function subscribe($events)
    {
        $events->listen('public_views.created', 'Cms\Events\Crud\PublicViewsEventHandler@onCreate');
        $events->listen('public_views.updated', 'Cms\Events\Crud\PublicViewsEventHandler@onUpdate');
        $events->listen('public_views.deleted', 'Cms\Events\Crud\PublicViewsEventHandler@onDelete');
    }

}