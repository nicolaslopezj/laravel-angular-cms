{{ Form::open(['action' => 'Cms\Auth\Controllers\RemindersController@postReset', 'method' => 'post']) }}
<h3>Change Password</h3>
<hr><br>
@if (Session::get('error'))
<div class="alert alert-danger">{{ Session::get('error') }}</div>
@endif

<input type="hidden" name="token" value="{{ $token }}">

<div class="form-group">
	<label>Email</label>
	<input type="email" class="form-control" name="email">
</div>
<div class="form-group">
	<label>New Password</label>
	<input type="password" class="form-control" name="password">
</div>
<div class="form-group">
	<label>Confirm Password</label>
	<input type="password" class="form-control" name="password_confirmation">
</div>
<div class="pull-right">
	<button class="btn btn-primary">Reset Password</button>
</div>
{{ Form::close() }}