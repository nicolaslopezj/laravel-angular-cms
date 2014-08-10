<!-- Sidebar -->
<div id="sidebar-wrapper" ng-controller="SidebarController">
    <ul class="sidebar-nav">
    	<li class="sidebar-brand">
		    <a href="{{ route('dev.index') }}">
		    	<i class="fa fa-chevron-left" style="font-size: 15px; margin-right: 5px;"></i> Developer
		    </a>
		</li>
		<li class="toolkit">
		    <a ng-click="newView()">
		    	<i class="fa fa-plus"></i> New File
		    </a>
		</li>
		<li ng-repeat="view in views">
			<a ng-class="{'active': activeView.id == view.id, 'has-changes': view.has_changes}" 
			href="#@{{ view.id }}" ng-click="openView(view.id)">
				<span class="pull-right side-tag">
					<span class="label label-default">@{{ view.tag }}</span>
				</span>
				@{{ view.name }}
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