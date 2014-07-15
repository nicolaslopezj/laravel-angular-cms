{{ Form::open(['route' => 'admin.users.store']) }}

<div class="form-group">
	<label>Name</label>
	<input class="form-control" name="name" value="{{ Input::old('name') }}">
	{{ $errors->first('name', '<br><div class="alert alert-danger">:message</div>') }}
</div>
<div class="form-group">
	<label>Email</label>
	<input class="form-control" name="email" value="{{ Input::old('email') }}">
	{{ $errors->first('email', '<br><div class="alert alert-danger">:message</div>') }}
</div>
<div class="form-group">
	<label>Role</label>
	{{ Form::select('role', 
		['normal' => 'normal', 'editor' => 'editor', 'admin' => 'admin', 'dev' => 'dev'], 
		Input::old('role'), ['class' => 'form-control']) }}
	{{ $errors->first('role', '<br><div class="alert alert-danger">:message</div>') }}
</div>
<hr>
<div class="pull-right">
	<a class="btn btn-default" href="{{ URL::route('admin.users.index') }}">Cancel</a>
	<button class="btn btn-primary">Save</button>
</div>

{{ Form::close() }}