{{ Form::open(['route' => 'admin.users.store']) }}

<div class="form-group">
	<label>{{ trans('admin.Name') }}</label>
	<input class="form-control" name="name" value="{{ Input::old('name') }}">
	{{ $errors->first('name', '<br><div class="alert alert-danger">:message</div>') }}
</div>
<div class="form-group">
	<label>{{ trans('admin.Email') }}</label>
	<input class="form-control" name="email" value="{{ Input::old('email') }}">
	{{ $errors->first('email', '<br><div class="alert alert-danger">:message</div>') }}
</div>
<div class="form-group">
	<label>{{ trans('admin.Role') }}</label>
	{{ Form::select('role', 
		['normal' => 'normal', 'editor' => 'editor', 'admin' => 'admin', 'dev' => 'dev'], 
		Input::old('role'), ['class' => 'form-control']) }}
	{{ $errors->first('role', '<br><div class="alert alert-danger">:message</div>') }}
</div>
<hr>
<div class="pull-right">
	<a class="btn btn-default" href="{{ URL::route('admin.users.index') }}">{{ trans('admin.Cancel') }}</a>
	<button class="btn btn-primary">{{ trans('admin.Save') }}</button>
</div>

{{ Form::close() }}