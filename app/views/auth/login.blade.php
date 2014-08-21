{{ Form::open(['route' => 'auth.login.post']) }}
<h3>Login</h3>
<hr><br>
@if (Session::get('url.intended'))
<div class="alert alert-warning">You need to log in to continue.</div>
@endif
@if (Session::get('error'))
<div class="alert alert-danger">{{ Session::get('error') }}</div>
@endif

<div class="form-group">
	<label>Email</label>
	<input type="email" class="form-control" name="email">
</div>
<div class="form-group">
	<label>Password</label>
	<input type="password" class="form-control" name="password">
</div>
<div class="clearfix">
	<div class="form-group pull-right">
		<label class="checkbox">
			<input type="checkbox" name="remember">
			Remember Me
		</label>
	</div>
	<a href="{{ URL::action('Cms\Auth\Controllers\RemindersController@getRemind') }}">
		Forgot your password?
	</a>
</div>
<style type="text/css">
.checkbox {
	margin: 0px;
}
</style>

<button class="btn btn-primary pull-right">Login</button>
{{ Form::close() }}