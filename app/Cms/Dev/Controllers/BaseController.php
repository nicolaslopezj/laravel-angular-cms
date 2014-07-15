<?php namespace Cms\Dev\Controllers;

class BaseController extends \BaseController {

	protected $layout = "dev.layouts.layout";

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
