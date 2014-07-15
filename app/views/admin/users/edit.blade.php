{{ Form::open(['route' => ['admin.users.update', $user->id], 'method' => 'put']) }}

<div class="form-group">
	<label>Name</label>
	<input class="form-control" name="name" value="{{ $user->name }}">
	{{ $errors->first('name', '<br><div class="alert alert-danger">:message</div>') }}
</div>
<hr>
<div class="form-group">
	<label>Old password</label>
	<input class="form-control" name="password">
	{{ $errors->first('password', '<br><div class="alert alert-danger">:message</div>') }}
</div>
<div class="form-group">
	<label>New password</label>
	<input class="form-control" name="password">
	{{ $errors->first('password', '<br><div class="alert alert-danger">:message</div>') }}
</div>
<div class="form-group">
	<label>Repeat new password</label>
	<input class="form-control" name="password">
	{{ $errors->first('password', '<br><div class="alert alert-danger">:message</div>') }}
</div>
<hr>
<div class="pull-right">
	<a class="btn btn-default" href="{{ URL::route('admin.users.show', $user->id) }}">Cancel</a>
	<button class="btn btn-primary">Save</button>
</div>

{{ Form::close() }}