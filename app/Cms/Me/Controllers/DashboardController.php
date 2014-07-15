<?php namespace Cms\Me\Controllers;

class DashboardController extends BaseController {

	public function index()
	{
		$this->layout->title = 'hola';
		$this->layout->content = \View::make('me.dashboard.index');
	}

}
