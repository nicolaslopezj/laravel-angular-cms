{{ Form::open(['route' => 'me.settings.update', 'method' => 'put']) }}

<div class="form-group">
	<label>{{ trans('me.Name') }}</label>
	<input class="form-control" name="name" value="{{ $user->name }}">
	{{ $errors->first('name', '<br><div class="alert alert-danger">:message</div>') }}
</div>
<hr>
<div class="pull-right">
	<button class="btn btn-primary">{{ trans('me.Save') }}</button>
</div>

{{ Form::close() }}