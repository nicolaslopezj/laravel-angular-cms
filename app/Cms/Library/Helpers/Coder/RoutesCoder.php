<?php namespace Cms\Library\Helpers\Coder;

class RoutesCoder {

	public function codeRoutes() {
		$routes = \PublicRouteDriver::all();

		$this->codeRoutesForRoutes($routes);
		$this->codeControllerForRoutes($routes);
	}

	public function codeRoutesForRoutes($routes) {
		$routes_content = $this->getRouteStartOfFile();
		foreach ($routes as $index => $route) {
			$routes_content .= $this->getRouteCodeForRoute($route);
		}
		$routes_content .= $this->getRouteEndOfFile();

		$routes_path = app_path() . '/Cms/Site/routes.php';
		\FilesHelper::overwriteFile($routes_path, $routes_content);
	}

	public function getRouteStartOfFile() {
		$content = "<?php" . PHP_EOL . PHP_EOL;
		$content.= "Route::group(['namespace' => 'Cms\Site\Controllers'], function() {" . PHP_EOL . PHP_EOL;

		return $content;
	}

	public function getRouteEndOfFile() {
		$content = "});";

		return $content;
	}

	public function getRouteCodeForRoute($route) {
		$code = "\tRoute::get('" . $route->path . "', [" . PHP_EOL;
		$code.= "\t'as' => 'site." . $route->name . "'," . PHP_EOL;
		$code.= "\t'uses' => 'SiteController@" . $route->name . "'," . PHP_EOL;
		$code.= "\t]);" . PHP_EOL;
		$code.= PHP_EOL;

		return $code;
	}
	
	public function codeControllerForRoutes($routes) {
		$controller_content = $this->getControllerStartOfFile();
		foreach ($routes as $index => $route) {
			$controller_content .= $this->getControllerCodeForRoute($route);
		}
		$controller_content .= $this->getControllerEndOfFile();

		$controller_path = app_path() . '/Cms/Site/Controllers/SiteController.php';
		\FilesHelper::overwriteFile($controller_path, $controller_content);
	}

	public function getControllerStartOfFile() {
		$content = "<?php namespace Cms\Site\Controllers;" . PHP_EOL . PHP_EOL;
		$content.= "use View;" . PHP_EOL . PHP_EOL;
		$content.= "class SiteController extends BaseController {" . PHP_EOL . PHP_EOL;

		return $content;
	}

	public function getControllerEndOfFile() {
		$content = "}";

		return $content;
	}

	public function getControllerCodeForRoute($route) {
		$code = "\tpublic function " . $route->name . "(";
		foreach ($route->parameters as $index => $parameter) {
			if ($index != 0) {
				$code.= ", ";
			}
			$code.= "$" . $parameter;
		}
		$code.= ") {" . PHP_EOL;
		$code.= "\t\t" . $route->function . PHP_EOL;
		$code.= "\t}" . PHP_EOL;
		$code.= PHP_EOL;

		return $code;
	}

}