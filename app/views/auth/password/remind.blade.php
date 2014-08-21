{{ Form::open(['action' => 'Cms\Auth\Controllers\RemindersController@postRemind', 'method' => 'post']) }}
<h3>Forgot Password</h3>
<hr><br>
@if (Session::get('error'))
<div class="alert alert-danger">{{ Session::get('error') }}</div>
@endif
@if (Session::get('status'))
<div class="alert alert-success">{{ Session::get('status') }}</div>
@endif
<div class="form-group">
	<label>Email</label>
	<input type="email" class="form-control" name="email">
</div>
<div class="pull-right">
	<a class="btn btn-default" href="{{ URL::route('login') }}">Cancel</a>
	<button class="btn btn-primary">Send Reminder</button>
</div>
{{ Form::close() }}