@foreach ($users as $index => $user)
	<div class="row">
		<div class="col-xs-12">
			<a class="pull-right btn btn-default btn-xs" href="{{ URL::route('admin.users.show', $user->id) }}">View</a>
			<p>
				Name:
				<b>{{ $user->name }}</b>
			</p>
			<p>
				Email:
				<code>{{ $user->email }}</code>
			</p>
		</div>
	</div>
	<hr>
@endforeach

{{ $users->links() }}

<a class="btn btn-default" href="{{ URL::route('admin.users.create') }}">Create</a>
<a class="btn btn-primary" href="{{ URL::route('admin.users.show', 'me') }}">Me</a>