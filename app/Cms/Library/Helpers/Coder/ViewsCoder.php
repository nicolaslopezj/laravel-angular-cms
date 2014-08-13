<?php namespace Cms\Library\Helpers\Coder;

class ViewsCoder {

	public function codeViews() {
		$views = \PublicViewDriver::all();

		foreach ($views as $index => $view) {
			$this->codeView($view);
		}
	}

	public function codeView($view) {
		$view_path = public_path() . '/site/' . $view->name;
		$view_content = $view->content;
		\FilesHelper::overwriteFile($view_path, $view_content);
	}

	public function deleteView($view) {
		try {
			$view_path = public_path() . '/site/' . $view->name;
			\FilesHelper::deleteFile($view_path);
		} catch (\Exception $e) {
			
		}
		
	}

}