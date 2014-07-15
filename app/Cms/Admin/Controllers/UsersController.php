<?php namespace Cms\Admin\Controllers;

class UsersController extends BaseController {

	public function index()
	{
		$users = \UserDriver::index();

		$this->layout->title = 'Users';
		$this->layout->content = \View::make('admin.users.index', compact('users'));
	}

	public function show($id)
	{
		if ($id == 'me') {
			$id = \Auth::user()->id;
		}
		$is_me = $id == \Auth::user()->id;
		$user = \UserDriver::get($id);

		$this->layout->title = $user->name;
		$this->layout->content = \View::make('admin.users.show', compact('user', 'is_me'));
	}

	public function create()
	{
		$this->layout->title = 'Create User';
		$this->layout->content = \View::make('admin.users.create');
	}

	public function delete($id) {
		if ($id == 'me') {
			$id = \Auth::user()->id;
		}

		$user = \UserDriver::get($id);

		$this->layout->title = $user->name . ' - Delete';
		$this->layout->content = \View::make('admin.users.delete', compact('user'));
	}

	public function edit($id)
	{
		if ($id == 'me') {
			$id = \Auth::user()->id;
		}

		$user = \UserDriver::get($id);

		$this->layout->title = $user->name . ' - Edit';
		$this->layout->content = \View::make('admin.users.edit', compact('user'));
	}

	public function store() {
		$data = \Input::all();

		try {
			$user = \UserDriver::storeFromAdmin($data);
		} catch (\Watson\Validating\ValidationException $e) {
			return \Redirect::route('admin.users.create')
			->withErrors($e->getErrors())
			->withInput();
		}


		return \Redirect::route('admin.users.show', $user->id);
	}

	public function update($id) {
		if ($id == 'me') {
			$id = \Auth::user()->id;
		}

		$data = \Input::all();

		try {
			$user = \UserDriver::update($id, $data);
		} catch (\Watson\Validating\ValidationException $e) {
			return \Redirect::route('admin.users.edit')
			->withErrors($e->getErrors())
			->withInput();
		}


		return \Redirect::route('admin.users.show', $user->id);
	}

	public function destroy($id) {
		if ($id == 'me') {
			$id = \Auth::user()->id;
		}

		\UserDriver::delete($id);

		return \Redirect::route('admin.users.index');
	}

}
