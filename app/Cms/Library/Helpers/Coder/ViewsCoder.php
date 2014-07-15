<?php namespace Cms\Library\Helpers\Coder;

class ViewsCoder {

	public function codeViews() {
		$views = \PublicViewDriver::all();

		$this->deleteFilesInFolder();
		$this->codeViewsForViews($views);
	}

	public function deleteFilesInFolder() {
		$folder_path = app_path() . '/views/site/';
		\FilesHelper::deleteFilesInFolder($folder_path);
	}

	public function codeViewsForViews($views) {

		foreach ($views as $index => $view) {
			$view_path = app_path() . '/views/site/' . $view->name . '.blade.php';
			$view_content = $view->content;
			\FilesHelper::overwriteFile($view_path, $view_content);
		}
		
	}

}