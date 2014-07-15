@extends('layouts.master')

@section('content')
<br>
<div class="row">
	<div class="col-sm-3">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Me</h3>
			</div>
			<div class="panel-body">
				<div class="list-group sidenav">
					@foreach (PackagesHelper::getUserSidebar() as $index => $params)
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