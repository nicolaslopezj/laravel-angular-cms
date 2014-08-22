<?php namespace Cms\Library\Drivers;

use Cms\Library\Clases\ModelDriverWithTag;

class PublicRouteDriver extends ModelDriverWithTag {

	protected $model = '\\PublicRoute';
	protected $events_name = 'public_routes';

	public function delete($id) {
		$model = $this->get($id);

		$model->delete();

		if (!empty($this->events_name)) {
			\Event::fire($this->events_name . '.deleted');
		}
	}

	public function getByName($name) {
		$class = $this->model;
		$route = $class::where('name', $name)->first();
		return $route;
	}

	public function getByPath($path) {
		$class = $this->model;
		$route = $class::where('path', $path)->first();
		return $route;
	}

}