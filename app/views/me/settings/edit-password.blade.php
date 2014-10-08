{{ Form::open(['route' => 'me.settings.update-password', 'method' => 'put']) }}

{{ $errors->first('error', '<br><div class="alert alert-danger">:message</div>') }}

<div class="form-group">
	<label>{{ trans('me.Old_Password') }}</label>
	<input class="form-control" name="old" type="password">
</div>
<div class="form-group">
	<label>{{ trans('me.New_Password') }}</label>
	<input class="form-control" name="new" type="password">
</div>
<div class="form-group">
	<label>{{ trans('me.Repeat_New_Password') }}</label>
	<input class="form-control" name="confirm" type="password">
</div>
<hr>
<div class="pull-right">
	<button class="btn btn-primary">{{ trans('me.Save') }}</button>
</div>

{{ Form::close() }}