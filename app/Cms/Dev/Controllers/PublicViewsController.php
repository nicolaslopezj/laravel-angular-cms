<?php namespace Cms\Dev\Controllers;

class PublicViewsController extends BaseController {

	public function index() {

		return \View::make('dev.public-views.base');
	}

}
