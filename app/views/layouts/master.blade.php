<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="user-scalable=no,width=device-width" />
	<title>CMS</title>
	<link rel="stylesheet" href="{{ asset('src/styles.css') }}">
	<link rel="stylesheet" href="{{ asset('src/styles2.css') }}">
	<link rel="stylesheet" href="{{ asset('src/slidebar.css') }}">
	<link rel="stylesheet" href="{{ asset('src/bower_components/components-font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('src/bower_components/bootstrap-markdown/css/bootstrap-markdown.min.css') }}">

	<script type="text/javascript" src="{{ asset('src/jquery.js') }}"></script>
	<script type="text/javascript" src="{{ asset('src/bower_components/angularjs/angular.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('src/bower_components/angular-bootstrap/ui-bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('src/bower_components/angular-bootstrap/ui-bootstrap-tpls.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('src/bower_components/angular-resource/angular-resource.js') }}"></script>
	<script type="text/javascript" src="{{ asset('src/bower_components/ace-builds/src-min-noconflict/ace.js') }}"></script>
	<script type="text/javascript" src="{{ asset('src/bower_components/angular-ui-ace/ui-ace.js') }}"></script>
	<script src="{{ asset('src/bower_components/ng-file-upload/angular-file-upload-shim.min.js') }}"></script> 
	<script type="text/javascript" src="{{ asset('src/angular/main/app.js') }}"></script>
	<script src="{{ asset('src/bower_components/ng-file-upload/angular-file-upload.min.js') }}"></script> 
	<script type="text/javascript" src="{{ asset('src/bower_components/markdown/lib/markdown.js') }}"></script>
	<script type="text/javascript" src="{{ asset('src/bower_components/bootstrap-markdown/js/bootstrap-markdown.js') }}"></script>
	<script type="text/javascript" src="{{ asset('src/bower_components/underscore/underscore.js') }}"></script>


	@yield('styles')
</head>
<body>
	@section('structure')
		<div id="wrapper" ng-app="cmsApp">

		    <!-- Sidebar -->
		    <div id="sidebar-wrapper">
		        <ul class="sidebar-nav">
		        	@yield('sidebar')
		        </ul>
	        	<a  href="http://nicolaslopez.co" target="_BLANK" class="creator-link">
	    			Nicolás López
	    		</a>
		    </div>
		    <!-- /#sidebar-wrapper -->

		    <!-- Page Content -->
		    <div id="page-content-wrapper">
		    	@include('layouts.header')

		        <div class="container-fluid">
		            @yield('content')
					@include('layouts.footer')
		        </div>
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

	@show
	
	<script type="text/javascript" src="{{ asset('src/jany.js') }}"></script>
	@yield('scripts')
</body>
</html>
