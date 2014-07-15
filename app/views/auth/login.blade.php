<br>
{{ Form::open(['route' => 'auth.login.post']) }}
<div class="row">
	<div class="col-sm-4 col-sm-offset-4">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Login</h3>
			</div>
			<div class="panel-body">
				@if (Session::get('url.intended'))
				<div class="alert alert-warning">You need to log in to continue.</div>
				@endif
				@if (Session::get('error'))
				<div class="alert alert-danger">{{ Session::get('error') }}</div>
				@else
				<br>
				@endif

				<div class="form-group">
					<label>Email</label>
					<input type="email" class="form-control" name="email">
				</div>
				<div class="form-group">
					<a class="pull-right" href="{{ URL::action('Cms\Auth\Controllers\RemindersController@getRemind') }}">Forgot your password?</a>
					<label>Password</label>
					<input type="password" class="form-control" name="password">
				</div>
				<div class="form-group">
					<label class="checkbox">
						<input type="checkbox" name="remember">
						Remember Me
					</label>
				</div>

			</div>
			<div class="panel-footer clearfix">
				<button class="btn btn-primary pull-right">Login</button>
			</div>
		</div>
	</div>
</div>
{{ Form::close() }}