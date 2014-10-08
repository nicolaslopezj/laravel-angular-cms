@if ($is_me) 
	<p>
		<span class="label label-primary">{{ trans('admin.Me') }}</span>
	</p>
@endif

<p><b>{{ trans('admin.Name') }}</b></p>
<p>
	{{ $user->name }}
</p>

<p><b>{{ trans('admin.Email') }}</b></p>
<p>
	<code>
	{{ $user->email }}
	</code>
</p>

<p><b>{{ trans('admin.Role') }}</b></p>
<p>
	<code>
	{{ $user->role }}
	</code>
</p>

<p><b>{{ trans('admin.Created_At') }}</b></p>
<p>
	{{ $user->created_at }}
</p>

<hr>
<a class="btn btn-default" href="{{ URL::route('admin.users.index') }}">{{ trans('admin.Back') }}</a>
@if ($is_me) 
	<a class="btn btn-warning" href="{{ URL::route('me.settings.edit') }}">{{ trans('admin.Edit') }}</a>
@endif
<a class="btn btn-danger" href="{{ URL::route('admin.users.delete', $user->id) }}">{{ trans('admin.Delete') }}</a>