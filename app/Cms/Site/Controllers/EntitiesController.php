<?php namespace Cms\Site\Controllers;

class EntitiesController extends BaseController {

	public function index($entity_id) {
		$entity = \EntityDriver::get($entity_id);
		$driver = new \EntityCrudDriver($entity->model_name);
		$items = $driver->all();
		return $items;
	}

	public function show($entity_id, $id) {
		$entity = \EntityDriver::get($entity_id);
		$driver = new \EntityCrudDriver($entity->model_name);
		$item = $driver->get($id);
		return $item;
	}


}
