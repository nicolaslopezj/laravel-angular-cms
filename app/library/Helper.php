<?php

class Helper {

	public static function urlWithParams($url, $params)
	{
		

		$_params = [];
		foreach ($params as $key => $value) {
			$_params[] = $key . '=' . urlencode($value);
		}

		$query = join('&', $_params);

		$info = parse_url($url);

		$new_url = $info['scheme'] . '://' . $info['host'];

		if (!empty($info['port'])) {
			$new_url .= ':' . $info['port'];
		}

		if (!empty($info['path'])) {
			$new_url .= $info['path'];
		}

		$new_url .= '?';

		$new_url .= $query;

		if (!empty($info['query'])) {
			$new_url .= '&' . $info['query'];
		}

		return $new_url;
	}

	public static function routeStartsWith($start)
	{
		$name = Route::currentRouteName();
		return starts_with($name, $start);
	}

	public static function urlStartsWith($start)
	{
		$name = Request::url();
		return starts_with($name, $start);
	}

	public static function urlContains($string)
	{
		$name = Request::url();
		return str_contains($name, $string);
	}

	public static function idToCode($id)
	{
		return self::convertToCode($id) . self::getValidatorCode($id);
	}

	public static function codeToId($code)
	{
		$code = strtoupper($code);
		$parts = [];
		$parts[0] = substr($code, 0, strlen($code) - 1);
		$parts[1] = substr($code, -1);

		$id = self::convertFromCode($parts[0]);
		$validator = self::getValidatorCode($id);

		if (count($parts) != 2) {
			return null;
		}
		if ($validator != $parts[1]) {
			return null;
		}

		return $id;
	}

	public static function getValidatorCode($id)
	{
		$code = array_sum(str_split($id));
		$code = ($code + 10) % 34;
		$code = self::convertToCode($code);

		return $code;
	}

	public static function convertToCode($number)
	{
		$number = (int) $number;
		$b = 26;
		$base = 'WQ36S29YXPGKD7M5FHCN8Z4TJR';
		$r = $number  % $b ;
		$res = $base[$r];
		$q = floor($number/$b);

		while ($q) {
			$r = $q % $b;
			$q = floor($q/$b);
			$res = $base[$r].$res;
		}

		return $res;
	}

	public static function convertFromCode($code)
	{
		$b = 26;
		$base = 'WQ36S29YXPGKD7M5FHCN8Z4TJR';

		$limit = strlen($code);
		$res = strpos($base, $code[0]);

		for($i = 1; $i < $limit; $i++) {
			$res = $b * $res + strpos($base, $code[$i]);
		}

		return $res;
	}

	public static function fileExtensionToFA($extension) {
		if (self::arrayIsOneOf($extension, ['jpg', 'png', 'jpeg', 'gif', 'bmp', 'psd'])) {return 'fa-file-image-o';};
		if (self::arrayIsOneOf($extension, ['pdf'])) {return 'fa-file-pdf-o';};
		if (self::arrayIsOneOf($extension, ['zip', 'rar'])) {return 'fa-file-archive-o';};
		if (self::arrayIsOneOf($extension, ['mp3', 'aac', 'wav', 'aiff'])) {return 'fa-file-audio-o';};
		if (self::arrayIsOneOf($extension, ['aaf', '3gp', 'mp4', 'mkv', 'avi', 'flv', 'm4v', 'mov'])) {return 'fa-file-video-o';};
		if (self::arrayIsOneOf($extension, ['xls', 'csv', 'xlsx', 'numbers'])) {return 'fa-file-excel-o';};
		if (self::arrayIsOneOf($extension, ['ppt', 'pptx', 'key'])) {return 'fa-file-powerpoint-o';};
		if (self::arrayIsOneOf($extension, ['php', 'js', 'json', 'xml', 'cpp', 'c', 'h', 'py', 'java', 'sql'])) {return 'fa-file-code-o';};
		if (self::arrayIsOneOf($extension, ['txt', 'pages'])) {return 'fa-file-text-o';}
		if (self::arrayIsOneOf($extension, ['doc', 'docx'])) {return 'fa-file-word-o';}
		return 'fa-file-o';
	}

	public static function arrayIsOneOf($array, $values) {
		foreach ($values as $value) {
			if ($array == $value) {
				return true;
			}
		}
		return false;
	}


}