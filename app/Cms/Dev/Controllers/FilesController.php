<?php namespace Cms\Dev\Controllers;

class FilesController extends BaseController {

	public function index() {
		$path = public_path() . '/uploads/files/';
		$files = \FilesHelper::filesInFolder($path);

		$this->layout->title = trans('dev.Files');
		$this->layout->content = \View::make('dev.files.index', compact('files'));
	}

	public function create() {
		$this->layout->title = 'Upload a File';
		$this->layout->content = \View::make('dev.files.create');
	}

	public function store() {
		$data = \Input::only(['file']);
		$path = public_path() . '/uploads/files/';
		\FilesHelper::storeFileInPath($path, $data['file']);

		return \Redirect::route('dev.files.index');
	}

	public function destroy($index) {
		$path = public_path() . '/uploads/files/';
		$files = \FilesHelper::filesInFolder($path);
		$file = $files[$index];
		$file_path = $path . $file['name'];

		\FilesHelper::deleteFile($file_path);

		return \Redirect::route('dev.files.index');
	}

}
