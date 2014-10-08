@foreach ($users as $index => $user)
	<div class="row">
		<div class="col-xs-12">
			<div style="padding-left: 15px">
				<a class="pull-right btn btn-default btn-xs" href="{{ URL::route('admin.users.show', $user->id) }}">{{ trans('admin.View') }}</a>
				<p>
					@if ($user->is_dev)
						<i class="fa fa-cogs" style="margin-left: -20px; margin-right: 2px;"></i>
					@elseif ($user->is_admin)
						<i class="fa fa-legal" style="margin-left: -20px; margin-right: 2px;"></i>
					@elseif ($user->is_editor)
						<i class="fa fa-file-text-o" style="margin-left: -20px; margin-right: 2px;"></i>
					@elseif ($user->is_normal)
						<i class="fa fa-user" style="margin-left: -20px; margin-right: 2px;"></i>
					@endif
					{{ trans('admin.Name') }}:
					<b>{{ $user->name }}</b>
				</p>
				<p>
					{{ trans('admin.Email') }}:
					<code>{{ $user->email }}</code>
				</p>
			</div>
		</div>
	</div>
	<hr>
@endforeach

{{ $users->links() }}

<a class="btn btn-default" href="{{ URL::route('admin.users.create') }}">{{ trans('admin.Create') }}</a>
