{{ Form::open(['route' => 'dev.definitions.store']) }}

<div class="row">
	<div class="col-sm-7">
		<div class="form-group">
			<label>{{ trans('dev.Identifier') }}</label>
			<input class="form-control" name="identifier" value="{{ Input::old('identifier') }}">
			{{ $errors->first('identifier', '<br><div class="alert alert-danger">:message</div>') }}
		</div>
	</div>
	<div class="col-sm-5">
		<div class="form-group">
			<label>{{ trans('dev.Tag') }}</label>
			<input class="form-control" name="tag" value="{{{ Input::old('tag') }}}">
			{{ $errors->first('tag', '<br><div class="alert alert-danger">:message</div>') }}
		</div>
	</div>
</div>

<div class="form-group">
	<label>{{ trans('dev.Description') }}</label>
	<input class="form-control" name="description" value="{{ Input::old('description') }}">
	{{ $errors->first('description', '<br><div class="alert alert-danger">:message</div>') }}
</div>
<div class="form-group">
	<label>{{ trans('dev.Type') }}</label>
	{{ Form::select('type',
		['string' => trans('dev.String'), 'text' => 'text', trans('dev.Integer') => 'integer', 'image' => trans('dev.Image'), 'code' => trans('dev.Code'), 'boolean' => trans('dev.Boolean')],
		Input::old('type'), ['class' => 'form-control']) }}
	{{ $errors->first('type', '<br><div class="alert alert-danger">:message</div>') }}
</div>
<div class="checkbox">
	<label>
		{{ Form::checkbox('editable', '1', Input::old('editable')); }}
		{{ trans('dev.Editable') }}
	</label>
</div>
{{ $errors->first('editable', '<br><div class="alert alert-danger">:message</div>') }}

<div class="checkbox">
	<label>
		{{ Form::checkbox('hidden', '1', Input::old('hidden')); }}
		{{ trans('dev.Hidden') }}
	</label>
</div>
{{ $errors->first('hidden', '<br><div class="alert alert-danger">:message</div>') }}

<hr>
<div class="pull-right">
	<a class="btn btn-default" href="{{ URL::route('dev.definitions.index') }}">{{ trans('dev.Cancel') }}</a>
	<button class="btn btn-primary">{{ trans('dev.Save') }}</button>
</div>

{{ Form::close() }}