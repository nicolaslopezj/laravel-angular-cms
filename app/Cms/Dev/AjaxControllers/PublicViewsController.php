<?php namespace Cms\Dev\AjaxControllers;

class PublicViewsController extends \Controller {

	public function index() {
		$public_views = \PublicViewDriver::all();
		return $public_views;		
	}

	public function show($id) {
		$public_view = \PublicViewDriver::get($id);
		return $public_view;
	}

	public function store() {
		$data = \Input::all();

		try {
			$public_view = \PublicViewDriver::store($data);
		} catch (\Watson\Validating\ValidationException $e) {
			$messages = $e->getErrors();
			$response = ['type' => 'error', 'messages' => $messages];
			return \Response::json($response, 400);
		}


		return $public_view;
	}

	public function update($id) {
		$data = \Input::all();

		try {
			$public_view = \PublicViewDriver::update($id, $data);
		} catch (\Watson\Validating\ValidationException $e) {
			return $e;
		}


		return $public_view;
	}

	public function destroy($id) {
		$public_view = \PublicViewDriver::delete($id);

		return;
	}

}
