<?php namespace Cms\Site\Controllers;

class DirectoryController extends \Controller {

	public function index() {
		$query = \PublicRouteDriver::query();
		$routes = $query->where('directory_hidden', false)->get();

		return \View::make('directory.views.main', compact('routes'));
	}

	public function depended($id) {
		$route = \PublicRouteDriver::get($id);
		$directory = json_decode($route->directory, 1);

		foreach ($route->dependencies as $dependency) {
			if (array_key_exists($dependency, $directory)) {
				$parts = explode('<', $directory[$dependency]);
				if (count($parts) == 3) {
					$items = \Evaluator::getQuery($directory[$dependency])->paginate(20);
					$identifier = $parts[2];
					return \View::make('directory.views.detail', compact('route', 'items', 'identifier', 'dependency'));
				}
			}
		}

		return '';
	}

}
