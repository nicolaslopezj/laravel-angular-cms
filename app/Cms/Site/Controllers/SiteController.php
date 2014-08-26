<?php namespace Cms\Site\Controllers;

class SiteController extends \Controller {

	private $public_route;

	public function missing() {
		return $this->index();
	}


	public function route() {
		$tags = $this->getMetaTags();
		$metas = $this->getMetas();
		return $this->index($metas, $tags);
	}

	protected function index($metas = [], $tags = '') {
		$views = \PublicViewDriver::all();
		$styles = [];
		$scripts = [];

		foreach ($views as $index => $view) {
			if (ends_with($view->name, '.js')) {
				$scripts[] = asset('site/' . $view->name);
			}

			if (ends_with($view->name, '.css')) {
				$styles[] = asset('site/' . $view->name);
			}
		}

		return \View::make('site.home', compact('styles', 'scripts', 'metas', 'tags'));
	}

	private function getMetas() {
		$route = $this->getPublicRoute();
		return [
			'title' => $this->evaluate($route->meta_title),
			'description' => $this->evaluate($route->meta_description),
			'image' => $this->evaluate($route->meta_image),
		];
	}

	private function getMetaTags() {
		$tags = $this->getPublicRoute()->meta_tags;
		$json = json_decode($tags);

		if (json_last_error()) {
			throw new \Exception("Error Decoding Meta Tags", 1);
		}
		$html = '';

		if (!$json) {
			return '';
		}

		foreach ($json as $index => $object) {
			$html .= '<meta';
			foreach ($object as $key => $value) {
				$value = htmlentities($this->evaluate($value));
				$html .= ' ' . $key . '="' . $value . '"';
			}
			$html .= '>';
		}

		return $html;
	}

	private function evaluate($text) {
		$re = "/\\*\\*[a-zA-Z0-9:.>_\- ]+\\*\\*/"; 
		preg_match_all($re, $text, $matches);

		foreach ($matches[0] as $match) {
			$text = str_replace($match, $this->evaluateText($match), $text);
		}

		return $text;
	}

	private function evaluateText($text) {
		$text = str_replace('**', '', $text);
		$parts = explode('>', $text);

		if (count($parts) != 3) {
			return '';
		}

		$driver = new \EntityCrudDriver($parts[0]);

		if (starts_with($parts[1], ':')) {
			$parts[1] = str_replace(':', '', $parts[1]);
			$parts[1] = $this->routeParameterToValue($parts[1]);
		}

		if (is_numeric($parts[1])) {
			$item = $driver->get($parts[1]);
		} else {
			$item = $driver->getBySlug($parts[1]);
		}

		if (!$item) {
			return '';
		}

		$array = array_dot($item->toArray());
		
		if (!array_key_exists($parts[2], $array)) {
			return '';
		}

		return $array[$parts[2]];
	}

	private function routeParameterToValue($parameter) {
		$route = \Route::current();
		$value = $route->parameters()[$parameter];
		return $value;
	}

	private function getPublicRoute() {
		if ($this->public_route) {
			return $this->public_route;
		}

		$route = \Route::current();
		$route_path = $route->uri();
		foreach ($route->parameters() as $key => $value) {
			$route_path = str_replace('{' . $key . '}', ':' . $key, $route_path);
		}
		if ($route_path == '/') {
			$route_path = '';
		}
		$this->public_route = \PublicRouteDriver::getByPath($route_path);
		return $this->public_route;
	}

}
