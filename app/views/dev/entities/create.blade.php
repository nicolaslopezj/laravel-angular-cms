{{ Form::open(['route' => 'dev.entities.store']) }}

<div class="form-group">
	<label>{{ trans('dev.Name') }}</label>
	<input class="form-control" name="name" value="{{ Input::old('name') }}">
	{{ $errors->first('name', '<br><div class="alert alert-danger">:message</div>') }}
</div>
<div class="form-group">
	<label>{{ trans('dev.Table_Name') }}</label>
	<input class="form-control" name="table_name" value="{{ Input::old('table_name') }}">
	{{ $errors->first('table_name', '<br><div class="alert alert-danger">:message</div>') }}
</div>
<div class="form-group">
	<label>{{ trans('dev.Route_Name') }}</label>
	<input class="form-control" name="route_name" value="{{ Input::old('route_name') }}">
	{{ $errors->first('route_name', '<br><div class="alert alert-danger">:message</div>') }}
</div>
<div class="form-group">
	<label>{{ trans('dev.Model_Name') }}</label>
	<div class="input-group">
		<span class="input-group-addon">Site\</span>
		<input class="form-control" name="model_name" value="{{ Input::old('model_name') }}">
	</div>
	{{ $errors->first('model_name', '<br><div class="alert alert-danger">:message</div>') }}
</div>
<div class="checkbox">
	<label>
		{{ Form::checkbox('has_slug', '1', Input::old('has_slug')); }}
		{{ trans('dev.Uses_Slug') }}
	</label>
</div>
<hr>
<div class="pull-right">
	<a class="btn btn-default" href="{{ URL::route('dev.entities.index') }}">{{ trans('dev.Cancel') }}</a>
	<button class="btn btn-primary">{{ trans('dev.Save') }}</button>
</div>

{{ Form::close() }}