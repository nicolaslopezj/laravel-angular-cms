<?php namespace Cms\Library\Helpers\Coder;

/*
This is not used
 */

class RoutesCoder {

	public function codeRoutes() {
		$routes = \PublicRouteDriver::all();
		$entities = \EntityDriver::all();
		$this->codeRoutesForRoutesAndEntities($routes, $entities);
	}

	public function codeRoutesForRoutesAndEntities($routes, $entities) {
		$content = \View::make('coder.routes.appjs', compact('routes', 'entities'));
		$path = public_path() . '/js/app.js';
		\FilesHelper::overwriteFile($path, $content);
	}


}