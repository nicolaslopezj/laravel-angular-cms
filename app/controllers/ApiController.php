<?php

class ApiController extends \Controller {

	public function callAction($method, $parameters)
	{
		$response = parent::callAction($method, $parameters);

		if (gettype($response) == 'object') {
			if (method_exists($response, 'toArray')) {
				$response = $response->toArray();
			} else {
				return $response;
			}
		}

		$fields = explode(',', \Input::get('fields'));
		if ($fields[0]) {
			$response = $this->filterResponse($fields, $response);
		}

		$callback = \Input::get('callback');
		if (!$callback) {
			$json = json_encode($response, JSON_PRETTY_PRINT);
			return \Response::make($json)->header('Content-Type', "application/json");
		} else {
			$data = [];
			$data['status_code'] = 200;
			$data['response'] = $response;
			return \Response::json($data)->setCallback($callback);
		}
	}

	public function filterResponse($fields, $response) {
		if (array_keys($response) !== range(0, count($response) - 1)) {
			if (array_key_exists('data', $response) && array_key_exists('current_page', $response) && array_key_exists('per_page', $response)) {
				$objects = $response['data'];
				$response['data'] = [];
				foreach ($objects as $object) {
					$response['data'][] = array_only($object, $fields);
				}
			} else {
				$response = array_only($response, $fields);
			}
		} else {
			$objects = $response;
			$response = [];
			foreach ($objects as $object) {
				$response[] = array_only($object, $fields);
			}
		}

		return $response;
	}

}
