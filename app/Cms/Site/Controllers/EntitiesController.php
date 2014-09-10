<?php namespace Cms\Site\Controllers;

class EntitiesController extends BaseController {

	public function index($entity) {
		$entity = \EntityDriver::findByRouteName($entity);
		$driver = new \EntityCrudDriver($entity->model_name);

		$options = \Input::all();
		$per_page = \Input::get('paginate');
		if ($per_page) {
			$page = \Input::get('page');
			$items = $driver->index($page, $per_page, $options);
		} else {
			$items = $driver->all($options);
		}

		return $items;
	}

	public function show($entity, $id) {
		$entity = \EntityDriver::findByRouteName($entity);
		$driver = new \EntityCrudDriver($entity->model_name);
		$item = $driver->get($id);
		return $item;
	}

}
