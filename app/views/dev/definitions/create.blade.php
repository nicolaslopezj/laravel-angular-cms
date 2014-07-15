{{ Form::open(['route' => 'dev.definitions.store']) }}

<div class="form-group">
	<label>Identifier</label>
	<input class="form-control" name="identifier" value="{{ Input::old('identifier') }}">
	{{ $errors->first('identifier', '<br><div class="alert alert-danger">:message</div>') }}
</div>
<div class="form-group">
	<label>Description</label>
	<input class="form-control" name="description" value="{{ Input::old('description') }}">
	{{ $errors->first('description', '<br><div class="alert alert-danger">:message</div>') }}
</div>
<div class="form-group">
	<label>Type</label>
	{{ Form::select('type', 
		['string' => 'string', 'text' => 'text', 'integer' => 'integer', 'image' => 'image'], 
		Input::old('type'), ['class' => 'form-control']) }}
	{{ $errors->first('type', '<br><div class="alert alert-danger">:message</div>') }}
</div>
<div class="checkbox">
	<label>
		{{ Form::checkbox('editable', '1', Input::old('editable')); }}
		Editable
	</label>
</div>
{{ $errors->first('editable', '<br><div class="alert alert-danger">:message</div>') }}
<hr>
<div class="pull-right">
	<a class="btn btn-default" href="{{ URL::route('dev.definitions.index') }}">Cancel</a>
	<button class="btn btn-primary">Save</button>
</div>

{{ Form::close() }}