<?php namespace Cms\Site\Controllers;

use View;

class SiteController extends BaseController {

	public function index() {
		return View::make('site.index');
	}

}