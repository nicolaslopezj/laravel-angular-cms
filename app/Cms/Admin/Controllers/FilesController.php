<?php namespace Cms\Admin\Controllers;

class FilesController extends BaseController {

	public function index() {

		return \View::make('admin.files.base');
	}

}
