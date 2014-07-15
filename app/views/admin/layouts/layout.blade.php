@extends('layouts.master')

@section('content')
<br>
<div class="row">
	<div class="col-sm-3">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Admin</h3>
			</div>
			<div class="panel-body">
				<div class="list-group sidenav">
					<a href="{{ URL::route('admin.users.index') }}" class="list-group-item
					@if (Helper::routeStartsWith('admin.users'))
					active
					@endif
					">
						Users
					</a>
					@foreach (EntityDriver::all() as $index => $entity)
						<a href="{{ URL::route('admin.' . $entity->route_name . '.index') }}" class="list-group-item
						@if (Helper::routeStartsWith('admin.' . $entity->route_name))
						active
						@endif
						">
						{{ str_plural($entity->name) }}
						</a>
					@endforeach
					<a href="{{ URL::route('admin.definitions.index') }}" class="list-group-item
					@if (Helper::routeStartsWith('admin.definitions'))
					active
					@endif
					">
						Dictionary
					</a>
					@foreach (PackagesHelper::getAdminSidebar() as $index => $params)
						<a href="{{ URL::route('admin.' . $params['route_index']) }}" class="list-group-item
						@if (Helper::routeStartsWith('admin.' . $params['route_check']))
						active
						@endif
						">
							{{ $params['name'] }}
						</a>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-9">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">{{ $title }}</h3>
			</div>
			<div class="panel-body">
				{{ $content }}
			</div>
		</div>
	</div>
</div>

@stop