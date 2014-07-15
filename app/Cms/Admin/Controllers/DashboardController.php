<?php namespace Cms\Admin\Controllers;

class DashboardController extends BaseController {

	public function index()
	{
		$this->layout->title = 'hola';
		$this->layout->content = \View::make('admin.dashboard.index');
	}

}
