@extends('layouts.master')

@section('sidebar')
<li class="sidebar-brand">
    Admin
</li>

<li>
	<a href="{{ URL::route('admin.users.index') }}" class="{{ Helper::routeStartsWith('admin.users') ? 'active' : '' }}">
		Users
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
		Dictionary
	</a>
</li>
@foreach (PackagesHelper::getAdminSidebar() as $index => $params)
<li>
	<a href="{{ URL::route('admin.' . $params['route_index']) }}" class="{{ Helper::routeStartsWith('admin.' . $params['route_check']) ? 'active' : '' }}">
		{{ $params['name'] }}
	</a>
</li>
@endforeach

@stop

@section('content')
<br>
<div class="row">
	@include('layouts.panel')
</div>

@stop