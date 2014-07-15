<?php namespace Cms\Dev\Controllers;

class DashboardController extends BaseController {

	public function index()
	{
		$this->layout->title = 'hola';
		$this->layout->content = \View::make('dev.dashboard.index');
	}

}
