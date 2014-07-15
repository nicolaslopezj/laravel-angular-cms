@extends('layouts.master')

@section('content')
<br>
<div class="row">
	<div class="col-sm-3">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Developer</h3>
			</div>
			<div class="panel-body">
				<div class="list-group sidenav">
					<a href="{{ URL::route('dev.public-views.index') }}" class="list-group-item
					@if (Helper::routeStartsWith('dev.public-views'))
					active
					@endif
					">
						Views
					</a>
					<a href="{{ URL::route('dev.public-routes.index') }}" class="list-group-item
					@if (Helper::routeStartsWith('dev.public-routes'))
					active
					@endif
					">
						Routes
					</a>
					<a href="{{ URL::route('dev.definitions.index') }}" class="list-group-item
					@if (Helper::routeStartsWith('dev.definitions'))
					active
					@endif
					">
						Dictionary
					</a>
					<a href="{{ URL::route('dev.entities.index') }}" class="list-group-item
					@if (Helper::routeStartsWith('dev.entities'))
					active
					@endif
					">
						Entities
					</a>
					<a href="{{ URL::route('dev.packages.index') }}" class="list-group-item
					@if (Helper::routeStartsWith('dev.packages'))
					active
					@endif
					">
						Packages
					</a>
					<a href="{{ URL::route('dev.images.index') }}" class="list-group-item
					@if (Helper::routeStartsWith('dev.images'))
					active
					@endif
					">
						Images
					</a>
					<a href="{{ URL::route('dev.files.index') }}" class="list-group-item
					@if (Helper::routeStartsWith('dev.files'))
					active
					@endif
					">
						Files
					</a>
					@foreach (PackagesHelper::getDevSidebar() as $index => $params)
						<a href="{{ URL::route('dev.' . $params['route_index']) }}" class="list-group-item
						@if (Helper::routeStartsWith('dev.' . $params['route_check']))
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