<br>
{{ Form::open(['action' => 'Cms\Auth\Controllers\RemindersController@postReset', 'method' => 'post']) }}
<div class="row">
	<div class="col-sm-4 col-sm-offset-4">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Change Password</h3>
			</div>
			<div class="panel-body">
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
			</div>
			<div class="panel-footer clearfix">
				<div class="pull-right">
					<button class="btn btn-primary">Reset Password</button>
				</div>
			</div>
		</div>
	</div>
</div>
{{ Form::close() }}