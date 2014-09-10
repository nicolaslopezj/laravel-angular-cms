<?php namespace Cms\Library\Helpers\CMSLang;

class Evaluator {

	public static function getEngine() {
		$engine = new Engine;
		return $engine;
	}

	public static function evaluateText($text, $dependencies = []) {
		$engine = self::getEngine();

		$re = "/{{[a-zA-Z0-9:.>_\\- ]+}}/";  
		preg_match_all($re, $text, $matches);

		foreach ($matches[0] as $match) {
			$clean_match = str_replace(['{{', '}}'], '', $match);
			$clean_match = trim($clean_match);
			$text = str_replace($match, $engine->evaluateOne($clean_match, $dependencies), $text);
		}

		return $text;
	}

	public static function evaluateTextInView($text, $dependencies = null) {
		if (!$dependencies) {
			$route = \Route::current();
			$dependencies = $route->parameters();
		}
		return self::evaluateText($text, $dependencies);
	}

	public static function getQuery($text) {
		$engine = self::getEngine();
		return $engine->evaluateQuery($text);
	}

}