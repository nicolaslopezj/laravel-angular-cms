<?php namespace Cms\Admin\Controllers;

class EntitiesController extends BaseController {

	public function __construct() {
		$uri = str_replace(\URL::route('admin.index'), '', \URL::current());
		$parts = explode('/', $uri);
		$route_name = $parts[1];
		$this->entity = \EntityDriver::findByRouteName($route_name);
		$this->driver = new \EntityCrudDriver($this->entity->model_name);
	}

	public function index()
	{
		$items = $this->driver->index();
		$entity = $this->entity;
		$this->layout->title = str_plural($entity->name);
		$this->layout->content = \View::make('admin.entities.index', compact('items', 'entity'));
	}

	public function show($id)
	{
		$item = $this->driver->get($id);
		$entity = $this->entity;
		$this->layout->title = str_plural($entity->name);
		$this->layout->content = \View::make('admin.entities.show', compact('item', 'entity'));
	}

	public function create()
	{
		$entity = $this->entity;
		$this->layout->title = 'Create a ' . $entity->name;
		$this->layout->content = \View::make('admin.entities.create', compact('entity'));
	}

	public function edit($id) {
		$item = $this->driver->get($id);
		$entity = $this->entity;
		$this->layout->title = $entity->name . ' - Edit';
		$this->layout->content = \View::make('admin.entities.edit', compact('item', 'entity'));
	}

	public function delete($id) {
		$item = $this->driver->get($id);
		$entity = $this->entity;
		$this->layout->title = $entity->name . ' - Delete';
		$this->layout->content = \View::make('admin.entities.delete', compact('item', 'entity'));
	}

	public function store()
	{
		$entity = $this->entity;
		$data = \Input::all();

		try {
			$item = $this->driver->store($data);
		} catch (\Watson\Validating\ValidationException $e) {
			return \Redirect::route('admin.' . $entity->route_name . '.create')
			->withErrors($e->getErrors())
			->withInput();
		}

		return \Redirect::route('admin.' . $entity->route_name . '.show', $item->id);
	}

	public function update($id) {
		$entity = $this->entity;
		$data = \Input::all();

		try {
			$item = $this->driver->update($id, $data);
		} catch (\Watson\Validating\ValidationException $e) {
			return \Redirect::route('admin.' . $entity->route_name . '.edit', $id)
			->withErrors($e->getErrors())
			->withInput();
		}


		return \Redirect::route('admin.' . $entity->route_name . '.show', $item->id);
	}

	public function destroy($id) {
		$entity = $this->entity;
		$this->driver->delete($id);

		return \Redirect::route('admin.' . $entity->route_name . '.index');
	}

}
