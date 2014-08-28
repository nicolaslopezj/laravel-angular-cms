@extends('layouts.master')

@section('structure')

	<div ng-app="cmsApp" ng-init="main_url = '@yield('main_url', route('dev.ajax'))'" class="ng-cloak">

		<div class="container">
			@yield('body')
		</div>

	</div>

@stop