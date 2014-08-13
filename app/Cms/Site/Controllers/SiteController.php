<?php namespace Cms\Site\Controllers;

class SiteController extends BaseController {

	public function index() {
		$views = \PublicViewDriver::all();
		$styles = [];
		$scripts = [];

		foreach ($views as $index => $view) {
			if (ends_with($view->name, '.js')) {
				$scripts[] = asset('site/' . $view->name);
			}

			if (ends_with($view->name, '.css')) {
				$styles[] = asset('site/' . $view->name);
			}
		}

		return \View::make('site.home', compact('styles', 'scripts'));
	}


}
