@extends('emails.layouts.base')

@section('content')

<p>
	<b>
		Change Password
	</b>
</p>

<p>
	To change your password, complete this form: {{ URL::action('Cms\Auth\Controllers\RemindersController@getReset', [$token]) }}.<br/>
	This link will expire in {{ Config::get('auth.reminder.expire', 60) }} minutes.
</p>

@stop