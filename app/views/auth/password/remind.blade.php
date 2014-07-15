<br>
{{ Form::open(['action' => 'Cms\Auth\Controllers\RemindersController@postRemind', 'method' => 'post']) }}
<div class="row">
	<div class="col-sm-4 col-sm-offset-4">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Forgot Password</h3>
			</div>
			<div class="panel-body">
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
			</div>
			<div class="panel-footer clearfix">
				<div class="pull-right">
					<a class="btn btn-default" href="{{ URL::route('login') }}">Cancel</a>
					<button class="btn btn-primary">Send Reminder</button>
				</div>
			</div>
		</div>
	</div>
</div>
{{ Form::close() }}