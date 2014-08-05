{{ Form::open(['route' => ['dev.public-routes.update', $public_route->id], 'method' => 'put']) }}

<div class="form-group">
	<label>Name</label>
	<input name="name" class="form-control" value="{{ $public_route->name }}">
	{{ $errors->first('name', '<br><div class="alert alert-danger">:message</div>') }}
</div>
<div class="form-group">
	<label>Path</label>
	<input name="path" class="form-control" value="{{ $public_route->path }}">
	{{ $errors->first('path', '<br><div class="alert alert-danger">:message</div>') }}
</div>
<div class="form-group">
	<label>Function</label>
	<textarea name="function" class="form-control">{{{ $public_route->function }}}</textarea>
	{{ $errors->first('function', '<br><div class="alert alert-danger">:message</div>') }}
</div>
<hr>
<div class="pull-right">
	<a class="btn btn-default" href="{{ URL::route('dev.public-routes.show', $public_route->id) }}">Cancel</a>
	<button class="btn btn-primary">Save</button>
</div>

{{ Form::close() }}