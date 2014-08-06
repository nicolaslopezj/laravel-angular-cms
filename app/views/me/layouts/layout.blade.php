@extends('layouts.master')

@section('content')
<br>
<div class="row">
	<div class="col-sm-3">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">{{ \UserDriver::loggedIn()->name }}</h3>
			</div>
			<div class="panel-body">
				<div class="list-group sidenav">
					<a href="{{ URL::route('me.index') }}" class="list-group-item
					@if (Helper::routeStartsWith('me.index'))
					active
					@endif
					">
						Dashboard
					</a>
					@foreach (PackagesHelper::getUserSidebar() as $index => $params)
						<a href="{{ URL::route('me.' . $params['route_index']) }}" class="list-group-item
						@if (Helper::routeStartsWith('me.' . $params['route_check']))
						active
						@endif
						">
							{{ $params['name'] }}
						</a>
					@endforeach
					<a href="{{ URL::route('me.settings.edit') }}" class="list-group-item
					@if (Helper::routeStartsWith('me.settings'))
					active
					@endif
					">
						Settings
					</a>
					<a href="{{ URL::route('logout') }}" class="list-group-item">
						Log out
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-9">
		@include('layouts.panel')
	</div>
</div>

@stop