@extends('layouts.master')

@section('sidebar')
<li class="sidebar-brand">
    {{ trans('dev.Developer') }}
</li>

<li>
	<a href="{{ URL::route('dev.public-views.index') }}" class="{{ Helper::routeStartsWith('dev.public-views') ? 'active' : '' }}">
		{{ trans('dev.Views') }}
	</a>
</li>
<li>
	<a href="{{ URL::route('dev.public-routes.index') }}" class="{{ Helper::routeStartsWith('dev.public-routes') ? 'active' : '' }}">
		{{ trans('dev.Routes') }}
	</a>
</li>
<li>
	<a href="{{ URL::route('dev.definitions.index') }}" class="{{ Helper::routeStartsWith('dev.definitions') ? 'active' : '' }}">
		{{ trans('dev.Dictionary') }}
	</a>
</li>
<li>
	<a href="{{ URL::route('dev.entities.index') }}" class="{{ Helper::routeStartsWith('dev.entities') ? 'active' : '' }}">
		{{ trans('dev.Entities') }}
	</a>
</li>
<li>
	<a href="{{ URL::route('dev.packages.index') }}" class="{{ Helper::routeStartsWith('dev.packages') ? 'active' : '' }}">
		{{ trans('dev.Packages') }}
	</a>
</li>
<li>
	<a href="{{ URL::route('dev.images.index') }}" class="{{ Helper::routeStartsWith('dev.images') ? 'active' : '' }}">
		{{ trans('dev.Images') }}
	</a>
</li>
<li>
	<a href="{{ URL::route('dev.files.index') }}" class="{{ Helper::routeStartsWith('dev.files') ? 'active' : '' }}">
		{{ trans('dev.Files') }}
	</a>
</li>
@foreach (PackagesHelper::getDevSidebar() as $index => $params)
	<li>
		<a href="{{ URL::route('dev.' . $params['route_index']) }}" class="
		@if (Helper::routeStartsWith('dev.' . $params['route_check']))
		active
		@endif
		">
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