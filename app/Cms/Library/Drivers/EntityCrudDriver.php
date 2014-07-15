<?php namespace Cms\Library\Drivers;

use Cms\Library\Clases\ModelDriver;

class EntityCrudDriver extends ModelDriver {

	protected $model;
	protected $entity;

	public function __construct($model) {
		$this->model = '\\Site\\' . $model;
		$this->entity = \EntityDriver::findByName($model);
	}

	public function index($page = 1, $per_page = 20) {
		$model = $this->model;
		$query = $model::where('id', '!=', 0);

		foreach ($this->entity->attributes as $index => $attribute) {
			if ($attribute->type == 'image') {
				$query->with('image_' . $attribute->name);
			}
		}

		$items = $query->paginate($per_page);
		return $items;
	}

	public function get($id) {
		$model = $this->model;
		$item = $model::where('id', $id);

		foreach ($this->entity->attributes as $index => $attribute) {
			if ($attribute->type == 'image') {
				$item->with('image_' . $attribute->name);
			}
		}

		return $item->first();
	}

	public function store($data) {

		foreach ($this->entity->attributes as $index => $attribute) {
			if ($attribute->type == 'image' && $data[$attribute->name]) {
				$image = \ImageDriver::store(['file' => $data[$attribute->name]]);
				$data[$attribute->name] = $image->id;
			} else if ($attribute->type == 'image') {
				unset($data[$attribute->name]);
			}
		}

		return parent::store($data);
	}

	public function update($id, $data) {

		foreach ($this->entity->attributes as $index => $attribute) {
			if ($attribute->type == 'image' && $data[$attribute->name]) {
				var_dump($data[$attribute->name]);
				$image = \ImageDriver::store(['file' => $data[$attribute->name]]);
				$data[$attribute->name] = $image->id;
			} else if ($attribute->type == 'image') {
				unset($data[$attribute->name]);
			}
		}

		return parent::update($id, $data);
	}

	public function findByModel($model) {

		$public_view = parent::store($data);

		return $public_view;

	}

}