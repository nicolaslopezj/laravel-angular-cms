@if ($is_me) 
	<p>
		<span class="label label-primary">Me</span>
	</p>
@endif

<p><b>Name</b></p>
<p>
	{{ $user->name }}
</p>

<p><b>Email</b></p>
<p>
	<code>
	{{ $user->email }}
	</code>
</p>

<p><b>Role</b></p>
<p>
	<code>
	{{ $user->role }}
	</code>
</p>

<p><b>Created At</b></p>
<p>
	{{ $user->created_at }}
</p>

<hr>
<a class="btn btn-default" href="{{ URL::route('admin.users.index') }}">Back</a>
@if ($is_me) 
	<a class="btn btn-warning" href="{{ URL::route('me.settings.edit') }}">Edit</a>
@endif
<a class="btn btn-danger" href="{{ URL::route('admin.users.delete', $user->id) }}">Delete</a>