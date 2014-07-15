{{ Form::open(['route' => 'me.settings.update-password', 'method' => 'put']) }}

{{ $errors->first('error', '<br><div class="alert alert-danger">:message</div>') }}

<div class="form-group">
	<label>Old password</label>
	<input class="form-control" name="old" type="password">
</div>
<div class="form-group">
	<label>New password</label>
	<input class="form-control" name="new" type="password">
</div>
<div class="form-group">
	<label>Confirm new password</label>
	<input class="form-control" name="confirm" type="password">
</div>
<hr>
<div class="pull-right">
	<button class="btn btn-primary">Save</button>
</div>

{{ Form::close() }}