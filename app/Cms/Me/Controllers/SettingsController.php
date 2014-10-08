<?php namespace Cms\Me\Controllers;

class SettingsController extends BaseController {

	public function edit() {
		$user = \UserDriver::loggedIn();
		$profile_view = \View::make('me.settings.edit', compact('user'));
		$password_view = \View::make('me.settings.edit-password', compact('user'));

		$content = [
			[
				'title' => trans('me.Profile'),
				'content' => $profile_view,
			],
			[
				'title' => trans('me.Change_Password'),
				'content' => $password_view,
			],
		];
		$this->layout->content = $content;
	}

	public function update() {
		$id = \UserDriver::loggedIn()->id;
		$data = \Input::all();

		try {
			$user = \UserDriver::update($id, $data);
		} catch (\Watson\Validating\ValidationException $e) {
			return \Redirect::route('me.settings.edit')
			->withErrors($e->getErrors())
			->withInput();
		}

		return \Redirect::route('me.index');
	}

	public function updatePassword() {
		$id = \UserDriver::loggedIn()->id;
		$data = \Input::all();

		try {
			$user = \UserDriver::changePassword($id, $data['old'], $data['new'], $data['confirm']);
		} catch (\Exception $e) {
			return \Redirect::route('me.settings.edit')
			->withErrors(['error' => $e->getMessage()])
			->withInput();
		}
		
		return \Redirect::route('me.index');
	}

}
