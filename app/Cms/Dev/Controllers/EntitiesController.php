<?php namespace Cms\Dev\Controllers;

class EntitiesController extends BaseController {

	public function index()
	{
		$entities = \EntityDriver::index();

		$this->layout->title = trans('dev.Entities');
		$this->layout->content = \View::make('dev.entities.index', compact('entities'));
	}

	public function show($id)
	{
		$entity = \EntityDriver::get($id);

		$this->layout->title = 'Entity - ' . $entity->name;
		$this->layout->content = \View::make('dev.entities.show', compact('entity'));
	}

	public function delete($id) {
		$entity = \EntityDriver::get($id);

		$this->layout->title = 'View - ' . $entity->name . ' - Delete';
		$this->layout->content = \View::make('dev.entities.delete', compact('entity'));
	}

	public function database($id) {
		$entity = \EntityDriver::get($id);
		$migrations = \EntityDriver::getMigrations($id);

		$this->layout->title = 'Entity - ' . $entity->name . ' - Database';
		$this->layout->content = \View::make('dev.entities.database', compact('entity', 'migrations'));
	}

	public function migrate($id) {
		$entity = \EntityDriver::get($id);
		$coder = new \Cms\Library\Helpers\Coder\EntitiesCoder;
		$coder->migrateEntity($entity, \Input::get('migration'));

		return \Redirect::route('dev.entities.database', $id);
	}

	public function create()
	{
		$this->layout->title = 'Create Entity';
		$this->layout->content = \View::make('dev.entities.create');
	}

	public function store(){
		$data = \Input::all();

		try {
			$entity = \EntityDriver::store($data);
		} catch (\Watson\Validating\ValidationException $e) {
			return \Redirect::route('dev.entities.create')
			->withErrors($e->getErrors())
			->withInput();
		}


		return \Redirect::route('dev.entities.show', $entity->id);
	}

	public function destroy($id) {
		\EntityDriver::delete($id);

		return \Redirect::route('dev.entities.index');
	}

}
