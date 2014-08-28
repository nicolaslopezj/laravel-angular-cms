<?php namespace Cms\Admin\AjaxControllers;

class FilesController extends \AjaxController {

	public $driver = '\FileDriver';

	public function download($id) {
		return \FileDriver::download($id);
	}

}
