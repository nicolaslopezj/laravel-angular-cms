<?php namespace Cms\Dev\AjaxControllers;

class PublicRoutesController extends \Controller {

	public function index() {
		$public_routes = \PublicRouteDriver::all();
		return $public_routes;
	}

	public function show($id) {
		$public_route = \PublicRouteDriver::get($id);
		return $public_route;
	}

	public function store() {
		$data = \Input::all();

		try {
			$public_route = \PublicRouteDriver::store($data);
		} catch (\Watson\Validating\ValidationException $e) {
			$messages = $e->getErrors();
			$response = ['type' => 'error', 'messages' => $messages];
			return \Response::json($response, 400);
		}

		return $public_route;
	}

	public function update($id) {
		$data = \Input::all();
		
		try {
			$public_route = \PublicRouteDriver::update($id, $data);
		} catch (\Watson\Validating\ValidationException $e) {
			$messages = $e->getErrors();
			$response = ['type' => 'error', 'messages' => $messages];
			return \Response::json($response, 400);
		}
		
		return $public_route;
	}

	public function destroy($id) {
		$public_route = \PublicRouteDriver::delete($id);

		return ;
	}

}
