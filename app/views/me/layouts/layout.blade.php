@extends('layouts.master')

@section('sidebar')
<li class="sidebar-brand">
    {{ \UserDriver::loggedIn()->name }}
</li>

<li>
	<a href="{{ URL::route('me.index') }}" class="{{ Helper::routeStartsWith('me.index') ? 'active' : '' }}">
		{{ trans('me.Dashboard') }}
	</a>
</li>
@foreach (PackagesHelper::getUserSidebar() as $index => $params)
<li>
	<a href="{{ URL::route('me.' . $params['route_index']) }}" class="{{ Helper::routeStartsWith('me.' . $params['route_check']) ? 'active' : '' }}">
		{{ $params['name'] }}
	</a>
</li>
@endforeach
<li>
	<a href="{{ URL::route('me.settings.edit') }}" class="{{ Helper::routeStartsWith('me.settings') ? 'active' : '' }}">
		{{ trans('me.Settings') }}
	</a>
</li>
<li>
	<a href="{{ URL::route('logout') }}">
		{{ trans('me.Log_Out') }}
	</a>
</li>

@stop

@section('content')
<br>
<div class="row">
	@include('layouts.panel')
</div>

@stop