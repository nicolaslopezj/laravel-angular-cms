<?php namespace Cms\Library\Helpers;


class PackagesHelper {

	public function installPackage($package) {
		$main = '\Cms\Packages\Source\\' . $package . '\Main';
		$main::install();
	}

	public function uninstallPackage($package) {
		$main = '\Cms\Packages\Source\\' . $package . '\Main';
		$main::uninstall();
	}

	public function getDevSidebar() {
		$packages = $this->listPackages();
		$sidebar = [];
		foreach ($packages as $index => $package) {
			try {
				$main = $this->getMainFileForPackage($package);
				if (method_exists($main, 'devSidebar')) {
					$params = $main::devSidebar();
					if ($params) {
						$sidebar[] = $params;
					}
				}
			} catch (\Exception $e) {
				
			}
		}
		return $sidebar;
	}

	public function getAdminSidebar() {
		$packages = $this->listPackages();
		$sidebar = [];
		foreach ($packages as $index => $package) {
			$main = $this->getMainFileForPackage($package);
			if (method_exists($main, 'adminSidebar')) {
				$params = $main::adminSidebar();
				if ($params) {
					$sidebar[] = $params;
				}
			}
		}
		return $sidebar;
	}

	public function getUserSidebar() {
		$packages = $this->listPackages();
		$sidebar = [];
		foreach ($packages as $index => $package) {
			$main = $this->getMainFileForPackage($package);
			if (method_exists($main, 'userSidebar')) {
				$params = $main::userSidebar();
				if ($params) {
					$sidebar[] = $params;
				}
			}
		}
		return $sidebar;
	}

	public function listPackages() {
		$path = app_path() . '/Cms/Packages/Source/';
		$files = \FilesHelper::filesInFolder($path);
		$packages = array_pluck($files, 'name');

		return $packages;
	}

	public function getMainFileForPackage($package) {
		$main = '\Cms\Packages\Source\\' . $package . '\Main';

		return $main;
	}

}