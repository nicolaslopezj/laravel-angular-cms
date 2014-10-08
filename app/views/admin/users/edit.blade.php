{{ Form::open(['route' => ['admin.users.update', $user->id], 'method' => 'put']) }}

<div class="form-group">
	<label>{{ trans('admin.Name') }}</label>
	<input class="form-control" name="name" value="{{ $user->name }}">
	{{ $errors->first('name', '<br><div class="alert alert-danger">:message</div>') }}
</div>
<hr>
<div class="form-group">
	<label>{{ trans('admin.Old_Password') }}</label>
	<input class="form-control" name="password">
	{{ $errors->first('password', '<br><div class="alert alert-danger">:message</div>') }}
</div>
<div class="form-group">
	<label>{{ trans('admin.New_Password') }}</label>
	<input class="form-control" name="password">
	{{ $errors->first('password', '<br><div class="alert alert-danger">:message</div>') }}
</div>
<div class="form-group">
	<label>{{ trans('admin.Repeat_New_Password') }}</label>
	<input class="form-control" name="password">
	{{ $errors->first('password', '<br><div class="alert alert-danger">:message</div>') }}
</div>
<hr>
<div class="pull-right">
	<a class="btn btn-default" href="{{ URL::route('admin.users.show', $user->id) }}">{{ trans('admin.Cancel') }}</a>
	<button class="btn btn-primary">{{ trans('admin.Save') }}</button>
</div>

{{ Form::close() }}