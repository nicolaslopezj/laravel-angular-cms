<?php namespace Cms\Library\Drivers;

use Cms\Library\Clases\ModelDriver;

class UserDriver extends ModelDriver {

	protected $model = '\\User';
	protected $events_name = 'users';

	public function loggedIn() {
		return \Auth::user();
	}

	public function changePassword($id, $old, $new, $confirm) {
		$user = $this->get($id);

		if ($new !== $confirm) {
			throw new \Exception('New password doesnt match', 1);
		}
		if (!\Hash::check($old, $user->password)) {
			throw new \Exception('Old password is incorrect', 1);
		}

		$user->password = $new;

		if (!$user->isValid('password', false)) {
			$errors = $user->getErrors()->toArray();
			throw new \Exception($errors['password'][0], 1);
		}
		$user->password = \Hash::make($new);
		$user->save();
	}

	public function store($data) {
		$model = new $this->model;

		$model->fill($data);
		$model->password = $data['password'];
		$model->isValid('creating');
		$model->password = \Hash::make($data['password']);
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

		try {
			\Mail::send('emails.users.welcome-admin', compact('user', 'password'), function($message) use ($user)
			{
				$message->to($user->email, $user->name)
				->subject('Account Created');
			});
		} catch (\Swift_RfcComplianceException $e) {
			throw new \Exception("You have to set \"email_from_email\" in the dictionary", 500);
		} catch (\Exception $e) {
			throw new \Exception("An error ocurred sending the email. Check \"mailgun_domain\" and \"mailgun_secret\" in the dictionary", 500);
		}

		return $user;
	}

}