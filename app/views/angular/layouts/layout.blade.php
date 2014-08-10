<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="user-scalable=no,width=device-width" />
	<title>CMS</title>
	<link rel="stylesheet" href="{{ asset('src/styles.css') }}">
	<link rel="stylesheet" href="{{ asset('src/styles2.css') }}">
	<link rel="stylesheet" href="{{ asset('src/slidebar.css') }}">
	
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

	<script type="text/javascript" src="{{ asset('src/jquery.js') }}"></script>
	<script type="text/javascript" src="{{ asset('src/bower_components/angularjs/angular.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('src/bower_components/angular-resource/angular-resource.js') }}"></script>
	<script type="text/javascript" src="{{ asset('src/angular/main/app.js') }}"></script>

	@yield('styles')
</head>
<body>
	<div id="wrapper" ng-app="cmsApp" ng-init="main_url = '{{ route('dev.ajax') }}'">

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
	<script type="text/javascript" src="{{ asset('src/jany.js') }}"></script>
	@yield('scripts')
</body>
</html>
