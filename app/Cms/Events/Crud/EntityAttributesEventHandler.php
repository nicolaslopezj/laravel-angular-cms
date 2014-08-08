<?php namespace Cms\Events\Crud;

class EntityAttributesEventHandler {

    public function onCreate($entity_attribute)
    {
        $entity = \EntityDriver::get($entity_attribute->entity_id);
        $migration = 'attributes.' . $entity_attribute->name . '.up';
        $coder = new \Cms\Library\Helpers\Coder\EntitiesCoder;
        
        try {
            $coder->migrateEntity($entity, $migration);
        } catch (\Exception $e) {
            
        }

        $coder->codeEntities();
    }

    public function onUpdate($entity_attribute)
    {
        $entity = \EntityDriver::get($entity_attribute->entity_id);
        $migration_down = 'attributes.' . $entity_attribute->name . '.down';
        $migration_up = 'attributes.' . $entity_attribute->name . '.down';

        $coder = new \Cms\Library\Helpers\Coder\EntitiesCoder;

        try {
            $coder->migrateEntity($entity, $migration_down);
            $coder->migrateEntity($entity, $migration_up);
        } catch (\Exception $e) {
            
        }

        $coder->codeEntities();
    }

    public function onDelete($entity_attribute)
    {
        $entity = \EntityDriver::get($entity_attribute->entity_id);
        $migration = 'attributes.' . $entity_attribute->name . '.down';
        $coder = new \Cms\Library\Helpers\Coder\EntitiesCoder;

        try {
            $coder->migrateEntity($entity, $migration);
        } catch (\Exception $e) {
            
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
        $events->listen('entity_attributes.created', 'Cms\Events\Crud\EntityAttributesEventHandler@onCreate');
        $events->listen('entity_attributes.updated', 'Cms\Events\Crud\EntityAttributesEventHandler@onUpdate');
        $events->listen('entity_attributes.deleted', 'Cms\Events\Crud\EntityAttributesEventHandler@onDelete');
    }

}