{{ Form::open(['route' => 'dev.entities.store']) }}

<div class="form-group">
	<label>Name</label>
	<input class="form-control" name="name" value="{{ Input::old('name') }}">
	{{ $errors->first('name', '<br><div class="alert alert-danger">:message</div>') }}
</div>
<div class="form-group">
	<label>Table Name</label>
	<input class="form-control" name="table_name" value="{{ Input::old('table_name') }}">
	{{ $errors->first('table_name', '<br><div class="alert alert-danger">:message</div>') }}
</div>
<hr>
<div class="pull-right">
	<a class="btn btn-default" href="{{ URL::route('dev.entities.index') }}">Cancel</a>
	<button class="btn btn-primary">Save</button>
</div>

{{ Form::close() }}