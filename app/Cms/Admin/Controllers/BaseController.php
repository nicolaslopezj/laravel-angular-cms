<?php namespace Cms\Admin\Controllers;

class BaseController extends \BaseController {

	protected $layout = "admin.layouts.layout";

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if (!is_null($this->layout))
		{
			$this->layout = \View::make($this->layout);
		}
	}

}
