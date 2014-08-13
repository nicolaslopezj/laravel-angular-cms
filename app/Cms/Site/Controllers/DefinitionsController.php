<?php namespace Cms\Site\Controllers;

class DefinitionsController extends BaseController {

	public function index() {
		$definitions = \DefinitionDriver::all('site', \Input::get('tag'));
		return $definitions;
	}

}
