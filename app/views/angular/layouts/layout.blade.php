@extends('layouts.master')

@section('structure')

	<div id="wrapper" ng-app="cmsApp" ng-init="main_url = '{{ route('dev.ajax') }}'" class="ng-cloak">

	    @yield('sidebar')

	    <!-- Page Content -->
	    <div id="page-content-wrapper">
	    	@include('layouts.header')
            @yield('content')
	    </div>
	    <!-- /#page-content-wrapper -->

	</div>
	<!-- /#wrapper -->

	<script>
	$("#menu-toggle").click(function(e) {
	    e.preventDefault();
	    $("#wrapper").toggleClass("toggled");
	});
	</script>
	<script type="text/javascript" src="{{ asset('src/bower_components/angularjs/angular.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('src/bower_components/angular-resource/angular-resource.js') }}"></script>
	<script type="text/javascript" src="{{ asset('src/angular/main/app.js') }}"></script>
@stop