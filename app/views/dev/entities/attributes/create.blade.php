{{ Form::open(['route' => ['dev.entities.attributes.store', $entity->id]]) }}

<div class="form-group">
	<label>{{ trans('dev.Name') }}</label>
	<input class="form-control" name="name" value="{{ Input::old('name') }}">
	{{ $errors->first('name', '<br><div class="alert alert-danger">:message</div>') }}
</div>
<div class="form-group">
	<label>{{ trans('dev.Description') }}</label>
	<input class="form-control" name="description" value="{{ Input::old('description') }}">
	{{ $errors->first('description', '<br><div class="alert alert-danger">:message</div>') }}
</div>
<div class="form-group">
	<label>{{ trans('dev.Type') }}</label>
	{{ Form::select('type',
		['string' => trans('dev.String'), 'text' => trans('dev.Text'), 'integer' => trans('dev.Integer'), 'image' => trans('dev.Image'), 'image_array' => trans('dev.Image_Array'),
		'markdown' => 'markdown'],
		Input::old('type'), ['class' => 'form-control']) }}
	{{ $errors->first('type', '<br><div class="alert alert-danger">:message</div>') }}
</div>

<hr>
<div class="pull-right">
	<a class="btn btn-default" href="{{ URL::route('dev.entities.show', $entity->id) }}">{{ trans('dev.Cancel') }}</a>
	<button class="btn btn-primary">{{ trans('dev.Save') }}</button>
</div>

{{ Form::close() }}