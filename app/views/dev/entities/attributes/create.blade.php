{{ Form::open(['route' => ['dev.entities.attributes.store', $entity->id]]) }}

<div class="form-group">
	<label>Name</label>
	<input class="form-control" name="name" value="{{ Input::old('name') }}">
	{{ $errors->first('name', '<br><div class="alert alert-danger">:message</div>') }}
</div>
<div class="form-group">
	<label>Description</label>
	<input class="form-control" name="description" value="{{ Input::old('description') }}">
	{{ $errors->first('description', '<br><div class="alert alert-danger">:message</div>') }}
</div>
<div class="form-group">
	<label>Type</label>
	{{ Form::select('type', 
		['string' => 'string', 'text' => 'text', 'integer' => 'integer', 'image' => 'image', 'image_array' => 'image_array',
		'markdown' => 'markdown'], 
		Input::old('type'), ['class' => 'form-control']) }}
	{{ $errors->first('type', '<br><div class="alert alert-danger">:message</div>') }}
</div>

<hr>
<div class="pull-right">
	<a class="btn btn-default" href="{{ URL::route('dev.entities.show', $entity->id) }}">Cancel</a>
	<button class="btn btn-primary">Save</button>
</div>

{{ Form::close() }}