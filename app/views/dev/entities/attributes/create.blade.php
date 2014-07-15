{{ Form::open(['route' => ['dev.entities.attributes.store', $entity->id]]) }}

<div class="form-group">
	<label>Name</label>
	<input class="form-control" name="name" value="{{ Input::old('name') }}">
	{{ $errors->first('name', '<br><div class="alert alert-danger">:message</div>') }}
</div>
<div class="form-group">
	<label>Type</label>
	<select class="form-control" name="type" value="{{ Input::old('type') }}">
		<option>string</option>
		<option>text</option>
		<option>integer</option>
		<option>image</option>
	</select>
	{{ $errors->first('type', '<br><div class="alert alert-danger">:message</div>') }}
</div>
<div class="form-group">
	<label>Validations</label>
	<input class="form-control" name="validations" value="{{ Input::old('validations') }}">
	{{ $errors->first('validations', '<br><div class="alert alert-danger">:message</div>') }}
</div>
<hr>
<div class="pull-right">
	<a class="btn btn-default" href="{{ URL::route('dev.entities.show', $entity->id) }}">Cancel</a>
	<button class="btn btn-primary">Save</button>
</div>

{{ Form::close() }}