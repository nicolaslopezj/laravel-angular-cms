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

	public function sitemap() {
		$query = \PublicRouteDriver::query();
		$urls = [];
		$routes = $query->where('directory_hidden', false)->get();

		foreach($routes as $route) {
			if (!$route->dependencies) {
				$urls[] = route($route->name);
			} else {
				$directory = json_decode($route->directory, 1);
				foreach ($route->dependencies as $dependency) {
					if (array_key_exists($dependency, $directory)) {
						$parts = explode('<', $directory[$dependency]);
						if (count($parts) == 3) {
							$items = \Evaluator::getQuery($directory[$dependency])->get();
							$identifier = $parts[2];
							foreach ($items as $item) {
								$urls[] = route($route->name, $item->{$identifier});
							}
						}
					}
				}
			}
		}

		$sitemap = '<?xml version="1.0" encoding="UTF-8"?>' . \View::make('directory.sitemapxml', compact('urls'));
		return \Response::make($sitemap, 200)->header('Content-Type', 'application/xml');
	}

}
