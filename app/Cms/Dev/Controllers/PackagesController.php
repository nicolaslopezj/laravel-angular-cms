<?php namespace Cms\Dev\Controllers;

class PackagesController extends BaseController {

	public function index() {
		$packages = \PackagesHelper::listPackages();

		$this->layout->title = trans('dev.Packages');
		$this->layout->content = \View::make('dev.packages.index', compact('packages'));
	}

	public function show($package) {
		$this->layout->title = 'Package - ' . $package;
		$this->layout->content = \View::make('dev.packages.show', compact('package'));
	}

	public function delete($package) {
		$this->layout->title = 'Uninstall Package - ' . $package;
		$this->layout->content = \View::make('dev.packages.delete', compact('package'));
	}

	public function create() {
		$this->layout->title = 'Install a Package';
		$this->layout->content = \View::make('dev.packages.create');
	}

	public function store() {
		$data = \Input::only(['file', 'github']);
		if (array_key_exists('github', $data)) {
			$path = app_path() . '/Cms/Packages/Temp/';
			$file = 'master.zip';
			$parts = explode('/', $data['github']);
			$name = end($parts);
			file_put_contents($path . $file, file_get_contents($data['github'] . "/archive/master.zip"));
			\FilesHelper::unzipFile($path . $file, $path);
			\PackagesHelper::installPackage($name . '-master');
		} else {
			$path = app_path() . '/Cms/Packages/Temp/';
			$file = \FilesHelper::storeFileInPath($path, $data['file']);
			\FilesHelper::unzipFile($path . $file, $path);
			\PackagesHelper::installPackage(str_replace('.zip', '', $file));
		}


		return \Redirect::route('dev.packages.index');
	}

	public function destroy($package) {
		\PackagesHelper::uninstallPackage($package);

		$path = app_path() . '/Cms/Packages/Source/' . $package;
		\FilesHelper::deleteDirectory($path);

		return \Redirect::route('dev.packages.index');
	}

}
