{{ Form::open(['route' => 'dev.public-views.store']) }}

<div class="form-group">
	<label>Name</label>
	<input class="form-control" name="name" value="{{ Input::old('name') }}">
	{{ $errors->first('name', '<br><div class="alert alert-danger">:message</div>') }}
</div>
<div class="form-group">
	<label>Content</label>
	<textarea name="content" class="form-control">{{ Input::old('content') }}</textarea>
	{{ $errors->first('content', '<br><div class="alert alert-danger">:message</div>') }}
</div>
<hr>
<div class="pull-right">
	<a class="btn btn-default" href="{{ URL::route('dev.public-views.index') }}">Cancel</a>
	<button class="btn btn-primary">Save</button>
</div>

{{ Form::close() }}