<li class="sidebar-brand">
    {{ trans('admin.Admin') }}
</li>

<li>
	<a href="{{ URL::route('admin.users.index') }}" class="{{ Helper::routeStartsWith('admin.users') ? 'active' : '' }}">
		{{ trans('admin.Users') }}
	</a>
</li>
@foreach (EntityDriver::all() as $index => $entity)
<li>
	<a href="{{ URL::route('admin.' . $entity->route_name . '.index') }}" class="{{ Helper::routeStartsWith('admin.' . $entity->route_name) ? 'active' : '' }}">
		{{ str_plural($entity->name) }}
	</a>
<li>
@endforeach
<li>
	<a href="{{ URL::route('admin.definitions.index') }}" class="{{ Helper::routeStartsWith('admin.definitions') ? 'active' : '' }}">
		{{ trans('admin.Dictionary') }}
	</a>
</li>
@foreach (PackagesHelper::getAdminSidebar() as $index => $params)
<li>
	<a href="{{ URL::route('admin.' . $params['route_index']) }}" class="{{ Helper::routeStartsWith('admin.' . $params['route_check']) ? 'active' : '' }}">
		{{ $params['name'] }}
	</a>
</li>
@endforeach
<li>
	<a href="{{ URL::route('admin.files.index') }}" class="{{ Helper::routeStartsWith('admin.files') ? 'active' : '' }}">
		{{ trans('admin.Files') }}
	</a>
</li>