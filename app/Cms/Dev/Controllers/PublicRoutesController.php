<?php namespace Cms\Dev\Controllers;

class PublicRoutesController extends BaseController {

	public function index() {
		return \View::make('dev.public-routes.base');
	}


}
