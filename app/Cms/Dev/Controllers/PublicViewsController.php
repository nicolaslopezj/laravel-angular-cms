<?php namespace Cms\Dev\Controllers;

class PublicViewsController extends BaseController {

	public function index() {
		$tag = \Input::get('tag');
		$public_views = \PublicViewDriver::index($tag);
		$tags = \PublicViewDriver::getTags();

		$this->layout->title = 'Views';
		$this->layout->content = \View::make('dev.public-views.index', compact('public_views', 'tags'));
	}

	public function show($id) {
		$public_view = \PublicViewDriver::get($id);

		$this->layout->title = 'View - ' . $public_view->name;
		$this->layout->content = \View::make('dev.public-views.show', compact('public_view'));
	}

	public function edit($id) {
		$public_view = \PublicViewDriver::get($id);

		$this->layout->title = 'View - ' . $public_view->name . ' - Edit';
		$this->layout->content = \View::make('dev.public-views.edit', compact('public_view'));
	}

	public function delete($id) {
		$public_view = \PublicViewDriver::get($id);

		$this->layout->title = 'View - ' . $public_view->name . ' - Delete';
		$this->layout->content = \View::make('dev.public-views.delete', compact('public_view'));
	}

	public function create() {
		$this->layout->title = 'Create a View';
		$this->layout->content = \View::make('dev.public-views.create');
	}

	public function store() {
		$data = \Input::all();

		try {
			$public_view = \PublicViewDriver::store($data);
		} catch (\Watson\Validating\ValidationException $e) {
			return \Redirect::route('dev.public-views.create')
			->withErrors($e->getErrors())
			->withInput();
		}


		return \Redirect::route('dev.public-views.show', $public_view->id);
	}

	public function update($id) {
		$data = \Input::all();

		try {
			$public_view = \PublicViewDriver::update($id, $data);
		} catch (\Watson\Validating\ValidationException $e) {
			return \Redirect::route('dev.public-views.edit', $id)
			->withErrors($e->getErrors())
			->withInput();
		}


		return \Redirect::route('dev.public-views.show', $public_view->id);
	}

	public function destroy($id) {
		$public_view = \PublicViewDriver::delete($id);

		return \Redirect::route('dev.public-views.index');
	}

}
