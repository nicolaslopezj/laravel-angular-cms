<?php namespace Cms\Dev\Controllers;

class PublicRoutesController extends BaseController {

	public function index() {
		$tag = \Input::get('tag');
		$public_routes = \PublicRouteDriver::index($tag);
		$tags = \PublicRouteDriver::getTags();

		$this->layout->title = 'Routes';
		$this->layout->content = \View::make('dev.public-routes.index', compact('public_routes', 'tags'));
	}

	public function show($id) {
		$public_route = \PublicRouteDriver::get($id);

		$this->layout->title = 'Route - ' . $public_route->name;
		$this->layout->content = \View::make('dev.public-routes.show', compact('public_route'));
	}

	public function edit($id) {
		$public_route = \PublicRouteDriver::get($id);

		$this->layout->title = 'Edit Route - ' . $public_route->name;
		$this->layout->content = \View::make('dev.public-routes.edit', compact('public_route'));
	}

	public function create() {
		$this->layout->title = 'Add A Route';
		$this->layout->content = \View::make('dev.public-routes.create');
	}

	public function delete($id) {
		$public_route = \PublicRouteDriver::get($id);

		$this->layout->title = 'Route - ' . $public_route->name . ' - Delete';
		$this->layout->content = \View::make('dev.public-routes.delete', compact('public_route'));
	}

	public function store() {
		$data = \Input::all();
		if ($data['function_type'] == 'custom') {
			$data['function'] = $data['function_custom'];
		}
		if ($data['function_type'] == 'view') {
			$data['function'] = "return View::make('site." . $data['function_view'] . "');";
		}

		try {
			$public_route = \PublicRouteDriver::store($data);
		} catch (\Watson\Validating\ValidationException $e) {
			return \Redirect::route('dev.public-routes.create')
			->withErrors($e->getErrors())
			->withInput();
		}


		return \Redirect::route('dev.public-routes.show', $public_route->id);
	}

	public function update($id) {
		$data = \Input::all();
		
		try {
			$public_route = \PublicRouteDriver::update($id, $data);
		} catch (\Watson\Validating\ValidationException $e) {
			return \Redirect::route('dev.public-routes.edit', $id)
			->withErrors($e->getErrors())
			->withInput();
		}


		return \Redirect::route('dev.public-routes.show', $id);
	}

	public function destroy($id) {
		$public_route = \PublicRouteDriver::delete($id);

		return \Redirect::route('dev.public-routes.index');
	}

}
