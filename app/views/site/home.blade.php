<!doctype html>
<html lang="en" ng-app="cmsApp">
<head>
	<meta charset="UTF-8">
	<base href="{{ url('/') }}/">
	<title ng-bind="page_title">{{ $metas['title'] }}</title>

	@foreach ($styles as $url)
	<link rel="stylesheet" href="{{ $url }}">
	@endforeach

	{{ $tags }}

	<script src="{{ asset('src/jquery.js') }}"></script>
	<script src="{{ asset('src/bower_components/angularjs/angular.min.js') }}"></script>
	<script src="{{ asset('src/bower_components/angular-route/angular-route.js') }}"></script>
	<script src="{{ asset('src/bower_components/angular-resource/angular-resource.js') }}"></script>
	<script src="{{ asset('src/bower_components/angular-route-segment/build/angular-route-segment.js') }}"></script>
	<script src="{{ asset('src/bower_components/angular-sanitize/angular-sanitize.min.js') }}"></script>
	<script src="{{ asset('src/bower_components/markdown/lib/markdown.js') }}"></script>
	<script src="{{ asset('js/app.js') }}"></script>

	@foreach ($scripts as $url)
	<script type="text/javascript" src="{{ $url }}"></script>
	@endforeach

	{{ Dict::get('head') }}
</head>
<body>

	<div ng-controller="CMSMainController">
		<div app-view-segment="0">
			<div class="metas clearfix">
				<h1>{{ $metas['title'] }}</h1>
				<img src="{{ $metas['image'] }}">
				<p>{{ $metas['description'] }}</p>
			</div>
			<style>
			.metas {
				margin: 0 auto 0 auto;
				width: 300px;
				text-align: center;
				opacity: 0.4;
    			filter: alpha(opacity=40); /* For IE8 and earlier */
				-moz-user-select: none;
				-khtml-user-select: none;
				-webkit-user-select: none;
				-ms-user-select: none;
				user-select: none;
			}
			.metas h1 {
				margin-top: 40px;
				font-size: 24px;
				line-height: 30px;
			}
			.metas img {
				max-width: 100%;
			}
			.metas p {
				margin-top: 20px;
				margin-bottom: 40px;
				font-size: 13px;
			}
			</style>
		</div>
	</div>

</body>
</html>