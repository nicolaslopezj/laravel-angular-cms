<?php namespace Cms\Admin\Controllers;

class EntityImagesController extends BaseController {

	public function __construct() {
		$uri = str_replace(\URL::route('admin.index'), '', \URL::current());
		$parts = explode('/', $uri);
		$route_name = $parts[1];
		$attribute = $parts[3];
		$this->entity = \EntityDriver::findByRouteName($route_name);
		$this->driver = new \EntityCrudDriver($this->entity->model_name);
		$this->attribute = $attribute;
	}

	public function index($entity_id)
	{
		$attribute = $this->attribute;
		$entity = $this->entity;
		$item = $this->driver->get($entity_id);
		$images = $item->{'images_' . $attribute};

		$this->layout->title = str_plural($entity->name) . ' - ' . ucwords($attribute);
		$this->layout->content = \View::make('admin.entities.images.index', compact('entity', 'item', 'attribute', 'images'));
	}

	public function show($entity_id, $id)
	{
		$attribute = $this->attribute;
		$entity = $this->entity;
		$item = $this->driver->get($entity_id);
		$image = \ImageDriver::get($id);

		$this->layout->title = str_plural($entity->name);
		$this->layout->content = \View::make('admin.entities.images.show', compact('entity', 'item', 'attribute', 'image'));
	}

	public function create($entity_id)
	{
		$attribute = $this->attribute;
		$entity = $this->entity;
		$item = $this->driver->get($entity_id);

		$this->layout->title = 'Upload ' . ucwords($attribute);
		$this->layout->content = \View::make('admin.entities.images.create', compact('entity', 'item', 'attribute'));
	}

	public function delete($entity_id, $id) {
		$attribute = $this->attribute;
		$entity = $this->entity;
		$item = $this->driver->get($entity_id);
		$image = \ImageDriver::get($id);

		$this->layout->title = ucwords($attribute) . ' - Delete';
		$this->layout->content = \View::make('admin.entities.images.delete', compact('entity', 'item', 'attribute', 'image'));
	}

	public function store($entity_id)
	{
		$attribute = $this->attribute;
		$entity = $this->entity;
		$item = $this->driver->get($entity_id);

		$data = \Input::file($attribute);

		foreach ($data as $file) {

			try {
				$image = $this->driver->addImage($item->id, $attribute, $file);
			} catch (\Watson\Validating\ValidationException $e) {
				return \Redirect::route('admin.' . $entity->route_name . '.' . $attribute . '.create', $item->id)
				->withErrors($e->getErrors())
				->withInput();
			}

		}
		
		return \Redirect::route('admin.' . $entity->route_name . '.' . $attribute . '.index', $item->slug_or_id);
	}

	public function destroy($entity_id, $id) {
		$attribute = $this->attribute;
		$entity = $this->entity;
		$this->driver->removeImage($entity_id, $attribute, $id);

		return \Redirect::route('admin.' . $entity->route_name . '.' . $attribute . '.index', $entity_id);
	}

}
