<?php namespace Cms\Library\Drivers;

use Cms\Library\Clases\ModelDriver;

class UserDriver extends ModelDriver {

	protected $model = '\\User';
	protected $events_name = 'users';

	public function store($data) {
		$model = new $this->model;

		$model->fill($data);
		$model->isValid();
		$model->password = \Hash::make($model->password);
		$model->save();

		if (!empty($this->events_name)) {
			\Event::fire($this->events_name . '.created', $model);
		}
		
		return $model;
	}

	public function storeFromAdmin($data) {
		$password = str_random(10);
		$data['password'] = $password;

		$user = $this->store($data);

		\Mail::send('emails.users.welcome-admin', compact('user', 'password'), function($message) use ($user)
		{
			$message->to($user->email, $user->name)
			->subject('Account Created');
		});

		return $user;
	}

}