<?php namespace Cms\Library\Drivers;

use Cms\Library\Clases\ModelDriver;

class EntityDriver extends ModelDriver {

	protected $model = '\\Entity';
	protected $events_name = 'entities';

	public function get($id) {
		$entity = \Entity::where('id', $id)
		->with('attributes')
		->first();
		return $entity;
	}

	public function delete($id) {
		$entity = $this->get($id);
		foreach ($entity->attributes as $index => $attribute) {
			$this->deleteAttribute($attribute);
		}
		parent::delete($id);
	}

	public function findByName($name) {
		$entity = \Entity::where('name', $name)
		->with('attributes')
		->first();
		return $entity;
	}

	public function findByModelName($model_name) {
		$entity = \Entity::where('model_name', $model_name)
		->with('attributes')
		->first();
		return $entity;
	}

	public function findByRouteName($route_name) {
		$entity = \Entity::where('route_name', $route_name)
		->with('attributes')
		->first();
		return $entity;
	}

	public function getAttribute($entity_id, $attribute_id) {
		$attribute = \EntityAttribute::where('entity_id', $entity_id)
		->where('id', $attribute_id)
		->first();
		return $attribute;
	}

	public function addAttribute($id, $data) {
		$attribute = new \EntityAttribute;

		$data['entity_id'] = $id;
		$attribute->fill($data);
		$attribute->isValid();
		$attribute->save();

		\Event::fire('entity_attributes.created', $attribute);

		return $attribute;
	}

	public function deleteAttribute($attribute) {
		\Event::fire('entity_attributes.deleted', $attribute);
		$attribute->delete();
		
		$coder = new \Cms\Library\Helpers\Coder\EntitiesCoder;
		$coder->codeEntities();
	}

	public function getMigrations($id) {
		$entity = $this->get($id);

		$migrations = [];

		try {
			$migrations['info'] = [];
			$migrations['info'][0]['name'] = 'site_' . $entity->table_name;
			$migrations['info'][0]['info'] = \DB::select(\DB::raw('describe site_' . $entity->table_name));
		} catch (\Exception $e) {
			$migrations['info'] = [];
		}

		foreach ($entity->attributes as $index => $attribute) {

			if ($attribute->type == 'image_array') {

				try {
					$info = [];
					$info['name'] = 'site_' . $entity->table_name . '_' . $attribute->name . '_images';
					$info['info'] = \DB::select(\DB::raw('describe site_' . $entity->table_name . '_' . $attribute->name . '_images'));
					$migrations['info'][] = $info;
				} catch (\Exception $e) {
					
				}
				
			}

		}

		$migrations['refresh'] = \View::make('coder.database.up.entity', compact('entity'));

		$migrations['delete'] = \View::make('coder.database.down.entity', compact('entity'));

		$migrations['attributes'] = [];
		foreach ($entity->attributes as $index => $attribute) {
			$up = \View::make('coder.database.up.entity-attribute.' . $attribute->type, compact('entity', 'attribute'));
			$migrations['attributes'][$attribute->name]['up'] = $up;

			$down = \View::make('coder.database.down.entity-attribute.' . $attribute->type, compact('entity', 'attribute'));
			$migrations['attributes'][$attribute->name]['down'] = $down;
		}

		return $migrations;
	}


}