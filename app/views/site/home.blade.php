<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<base href="{{ url('/') }}/">
	
	{{ Dict::get('head') }}

	@foreach ($styles as $url)
	<link rel="stylesheet" href="{{ $url }}">
	@endforeach

	<script type="text/javascript" src="{{ asset('src/jquery.js') }}"></script>
	<script type="text/javascript" src="{{ asset('src/bower_components/angularjs/angular.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('src/bower_components/angular-route/angular-route.js') }}"></script>
	<script type="text/javascript" src="{{ asset('src/bower_components/angular-resource/angular-resource.js') }}"></script>
	<script type="text/javascript" src="{{ asset('src/bower_components/angular-route-segment/build/angular-route-segment.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

	@foreach ($scripts as $url)
	<script type="text/javascript" src="{{ $url }}"></script>
	@endforeach

	
</head>
<body ng-app="cmsApp">

	<div ng-controller="CMSMainController">
		<div app-view-segment="0"></div>
	</div>

</body>
</html>