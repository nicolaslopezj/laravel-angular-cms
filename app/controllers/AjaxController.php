<?php

class AjaxController extends ApiController {

	public function index() {
		$driver = $this->driver;
		$options = \Input::all();
		$items = $driver::all($options);
		return $items;
	}

	public function show($id) {
		$driver = $this->driver;
		$item = $driver::get($id);
		return $item;
	}

	public function store() {
		$driver = $this->driver;
		$data = \Input::all();

		try {
			$item = $driver::store($data);
		} catch (\Watson\Validating\ValidationException $e) {
			$messages = $e->getErrors();
			$response = ['type' => 'error', 'messages' => $messages];
			return \Response::json($response, 400);
		}

		return $item;
	}

	public function update($id) {
		$driver = $this->driver;
		$data = \Input::all();
		
		try {
			$item = $driver::update($id, $data);
		} catch (\Watson\Validating\ValidationException $e) {
			$messages = $e->getErrors();
			$response = ['type' => 'error', 'messages' => $messages];
			return \Response::json($response, 400);
		}
		
		return $item;
	}

	public function destroy($id) {
		$driver = $this->driver;
		$item = $driver::delete($id);

		return ;
	}

}