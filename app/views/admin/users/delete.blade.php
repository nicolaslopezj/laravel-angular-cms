{{ Form::open(['route' => ['admin.users.destroy', $user->id], 'method' => 'delete']) }}

<p><b>Are you sure you want to delete this user?</b></p>
<hr>
<div class="pull-right">
	<a class="btn btn-default" href="{{ URL::route('admin.users.show', $user->id) }}">Cancel</a>
	<button class="btn btn-danger">Delete</button>
</div>

{{ Form::close() }}