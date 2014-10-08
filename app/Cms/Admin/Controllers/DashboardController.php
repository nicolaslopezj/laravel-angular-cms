<?php namespace Cms\Admin\Controllers;

class DashboardController extends BaseController {

	public function index()
	{
		$this->layout->title = trans('admin.Admin');
		$this->layout->content = \View::make('admin.dashboard.index');
	}

}
