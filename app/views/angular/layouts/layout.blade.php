<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CMS</title>
	<link rel="stylesheet" href="{{ asset('src/styles.css') }}">
	<link rel="stylesheet" href="{{ asset('src/styles2.css') }}">
	<link rel="stylesheet" href="{{ asset('src/slidebar.css') }}">

	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

	<script type="text/javascript" src="{{ asset('src/jquery.js') }}"></script>
	<script type="text/javascript" src="{{ asset('src/bower_components/angularjs/angular.min.js') }}"></script>

	@yield('styles')
</head>
<body>
	@yield('app')

	@yield('scripts')
</body>
</html>
