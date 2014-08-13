<!-- Sidebar -->
<div id="sidebar-wrapper" ng-controller="SidebarController">
    <ul class="sidebar-nav">
    	<li class="sidebar-brand">
		    <a href="{{ route('dev.index') }}">
		    	<i class="fa fa-chevron-left" style="font-size: 15px; margin-right: 5px;"></i> Developer
		    </a>
		</li>
		<li class="toolkit">
		    <a ng-click="newRoute()">
		    	<i class="fa fa-plus"></i> New Route
		    </a>
		</li>
		<li ng-repeat="route in routes">
			<a href="javascript:void()" ng-click="openRoute(route)" ng-class="{'active': activeRoute.id == route.id && route.id, 'has-changes': route.has_changes}" >
				<span ng-if="route.name && route.id">@{{ route.name }}</span>
				<span ng-if="!route.name || !route.id">No Name</span>
			</a>
		</li>
    </ul>
	<a  href="http://nicolaslopez.co" target="_BLANK" class="creator-link">
		Nicolás López
	</a>
</div>
<!-- /#sidebar-wrapper -->

<style>
	.toolkit a {
		cursor: pointer;
	}
	.sidebar-nav li.toolkit a:hover {
		background: #000;
	}
	.toolkit .fa {
		font-size: 15px; margin-right: 5px; margin-left: -20px;
	}
	.has-changes {
		font-style: italic;
	}
	.side-tag {
		margin-right: 10px;
	}
</style>