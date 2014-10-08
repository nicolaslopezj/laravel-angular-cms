<?php namespace Cms\Dev\Controllers;

class DashboardController extends BaseController {

	public function index()
	{
		$this->layout->title = trans('dev.Developer');
		$this->layout->content = \View::make('dev.dashboard.index');
	}

}
