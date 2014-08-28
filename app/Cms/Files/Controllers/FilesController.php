<?php namespace Cms\Files\Controllers;

class FilesController extends BaseController {

	public function show($name) {
		$file_link = \FileLinkDriver::first(['name' => $name]);
		if (!$file_link) {
			\App::abort(404);
		}
		$file = \FileDriver::get($file_link->file_id);
		if (!$file) {
			\App::abort(404);
		}
		return \View::make('files.file.show', compact('file_link', 'file'));
	}

	public function download($file_id, $token) {
		$response = \FileDriver::download($file_id, $token);
		return $response;
	}

}