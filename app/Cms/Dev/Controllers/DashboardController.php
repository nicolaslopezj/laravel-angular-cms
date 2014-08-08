<?php namespace Cms\Dev\Controllers;

class DashboardController extends BaseController {

	public function index()
	{
		$this->layout->title = 'Developer';
		$this->layout->content = \View::make('dev.dashboard.index');
	}

}
