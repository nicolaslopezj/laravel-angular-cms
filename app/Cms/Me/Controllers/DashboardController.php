<?php namespace Cms\Me\Controllers;

class DashboardController extends BaseController {

	public function index()
	{
		$user = \UserDriver::loggedIn();
		$this->layout->title = trans('me.Dashboard');
		$this->layout->content = \View::make('me.dashboard.index', compact('user'));
	}

}
