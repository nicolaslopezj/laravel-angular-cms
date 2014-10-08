<p><b>{{ trans('me.Name') }}</b></p>
<p>
	{{ $user->name }}
</p>

<p><b>{{ trans('me.Email') }}</b></p>
<p>
	<code>
	{{ $user->email }}
	</code>
</p>

<p><b>{{ trans('me.Role') }}</b></p>
<p>
	<code>
	{{ $user->role }}
	</code>
</p>

<p><b>{{ trans('me.Created_At') }}</b></p>
<p>
	{{ $user->created_at }}
</p>