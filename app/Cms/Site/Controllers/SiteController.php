<?php namespace Cms\Site\Controllers;

use View;

class SiteController extends BaseController {

	public function home() {
		return View::make('site.index');
	}

}