<?php namespace Cms\Site\Controllers;

class EntitiesController extends BaseController {

	public function index($entity) {
		$entity = \EntityDriver::findByRouteName($entity);
		$driver = new \EntityCrudDriver($entity->model_name);
		$items = $driver->all();
		return $items;
	}

	public function show($entity, $id) {
		$entity = \EntityDriver::findByRouteName($entity);
		$driver = new \EntityCrudDriver($entity->model_name);
		$item = $driver->get($id);
		return $item;
	}

	public function showSlug($entity, $slug) {
		$entity = \EntityDriver::findByRouteName($entity);
		$driver = new \EntityCrudDriver($entity->model_name);
		$item = $driver->getBySlug($slug);
		return $item;
	}


}
