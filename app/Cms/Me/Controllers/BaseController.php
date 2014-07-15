<?php namespace Cms\Me\Controllers;

class BaseController extends \BaseController {

	protected $layout = "me.layouts.layout";

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
