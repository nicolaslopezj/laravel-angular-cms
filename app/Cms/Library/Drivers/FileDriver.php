<?php namespace Cms\Library\Drivers;

use Cms\Library\Clases\ModelDriver;
use League\Flysystem\Filesystem;
use League\Flysystem\Adapter\Local;

class FileDriver extends ModelDriver {

	protected $model = '\\DBFile';
	private $flysystem;

	public function __construct() {
		$adapter = new Local(app_path() . 'storage/files');
		$this->flysystem = new Filesystem($adapter);
	}

	public function canDownloadFromFolder($file, $folder_link) {
		if ($file_link->max_downloads && $file_link->downloads >= $file_link->max_downloads) {
			return false;
		}

		if ($file_link->expires_on /*&& $file_link->expires_on >= */) {
			return false;
		}

		return true;
	}

	public function willDownloadFromFile($file, $token) {
		$file_link = \FileLinkDriver::first(['token' => $token]);

		if (!$file_link->is_valid) {
			throw new \Exception("Cant download", 1);
		}

		$file_link->downloads += 1;
		$file_link->save();

		return true;
	}

	public function download($id, $token = null, $token_type = 'file') {
		$file = $this->get($id);

		if ($token || $token_type == 'file') {
			$this->willDownloadFromFile($file, $token);
		}

		$file->downloads += 1;
		$file->save();
		
		return \Response::download($file->system_path, $file->filename);
	}

	private function saveFile($file, $name) {
		$path = app_path() . '/storage/files/';
		\FilesHelper::storeFileInPath($path, $file, $name);
	}

	private function deleteFile($path) {
		\FilesHelper::deleteFile($path);
	}

	public function store($data) {

		$validator = \Validator::make($data, ['file' => 'required']);

		if ($validator->fails())
		{
			$exception = new \Watson\Validating\ValidationException('Model failed validation');
            $exception->setErrors($validator->messages());
            throw $exception;
		}

		$file = new \DBFile;
		$path = $data['path'] ? $data['path'] . '/' : '';
		$file->name = $path . $data['file']->getClientOriginalName();
		$file->size = $data['file']->getSize();
		$file->mime = $data['file']->getMimeType();
		$file->system_name = uniqid() . '-' . $data['file']->getClientOriginalName();

		$file->save();

		$this->saveFile($data['file'], $file->system_name);

		return $file;
	}

	public function delete($id) {
		$model = $this->get($id);
		$this->deleteFile($model->system_path);
		$model->delete();
	}

}