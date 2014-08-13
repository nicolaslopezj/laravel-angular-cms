<?php namespace Cms\Events\Crud;

class EntitiesEventHandler {

    public function onCreate($entity)
    {
        $coder = new \Cms\Library\Helpers\Coder\RoutesCoder;
        $coder->codeRoutes();

        $coder = new \Cms\Library\Helpers\Coder\EntitiesCoder;
        $coder->codeEntities();

        try {
            $coder->migrateEntity($entity, 'refresh');
        } catch (Exception $e) {
            
        }
    }

    public function onUpdate($entity)
    {
        $coder = new \Cms\Library\Helpers\Coder\RoutesCoder;
        $coder->codeRoutes();

        $coder = new \Cms\Library\Helpers\Coder\EntitiesCoder;
        $coder->codeEntities();
    }

    public function onDelete($entity)
    {
        $coder = new \Cms\Library\Helpers\Coder\RoutesCoder;
        $coder->codeRoutes();
        
        $coder = new \Cms\Library\Helpers\Coder\EntitiesCoder;
        
        try {
            $coder->migrateEntity($entity, 'delete');
        } catch (Exception $e) {
            
        }
        
        $coder->codeEntities();
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $events
     * @return array
     */
    public function subscribe($events)
    {
        $events->listen('entities.created', 'Cms\Events\Crud\EntitiesEventHandler@onCreate');
        $events->listen('entities.updated', 'Cms\Events\Crud\EntitiesEventHandler@onUpdate');
        $events->listen('entities.deleted', 'Cms\Events\Crud\EntitiesEventHandler@onDelete');
    }

}