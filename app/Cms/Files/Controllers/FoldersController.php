<?php namespace Cms\Files\Controllers;

class FoldersController extends \BaseController {

	public function show($name) {
		$folder_link = \FolderLinkDriver::first(['name' => $name]);
		return $folder_link;
	}
}
