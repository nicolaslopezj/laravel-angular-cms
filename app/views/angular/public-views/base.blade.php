@extends('angular.layouts.layout')

@section('app')
<div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <a href="#">
                    CMS
                </a>
            </li>
        </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
    	<div class="navbar navbar-default">
			<div class="navbar-header">
				<a href="#menu-toggle" class="navbar-brand" id="menu-toggle"><i class="fa fa-bars"></i></a>
			</div>
			<div class="navbar-collapse collapse navbar-responsive-collapse">
				<ul class="nav navbar-nav navbar-right">
					@if (Auth::check())
						@if (Auth::user()->is_dev)
							<li class="{{ Helper::routeStartsWith('dev.') ? 'active' : '' }}">
								<a href="{{ route('dev.index') }}">Dev</a>
							</li>
						@endif
						@if (Auth::user()->is_admin || Auth::user()->is_dev)
							<li class="{{ Helper::routeStartsWith('admin.') ? 'active' : '' }}">
								<a href="{{ route('admin.index') }}">Admin</a>
							</li>
						@endif
						<li class="{{ Helper::routeStartsWith('me.') ? 'active' : '' }}">
							<a href="{{ route('me.index') }}">{{ Auth::user()->name }}</a>
						</li>
					@endif
				</ul>
			</div>
		</div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Simple Sidebar</h1>
                    <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                    <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
                    
                </div>
            </div>
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
@stop