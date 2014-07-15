<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CMS</title>
	<link rel="stylesheet" href="{{ asset('src/styles.css') }}">
	<link rel="stylesheet" href="{{ asset('src/styles2.css') }}">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

	<script type="text/javascript" src="{{ asset('src/jquery.js') }}"></script>

	@yield('styles')
</head>
<body>
	<div id="wrapper">
		@include('layouts.header')
		<div class="container">
		@yield('content')
		</div>
		@include('layouts.footer')
	</div>

	<script type="text/javascript" src="{{ asset('src/jany.js') }}"></script>
	@yield('scripts')
</body>
</html>
