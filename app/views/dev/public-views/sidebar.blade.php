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
		<li style="margin-left: -20px" class="tree-container">
			<tree family="tree"></tree>
		</li>
    </ul>
	<a  href="http://nicolaslopez.co" target="_BLANK" class="creator-link">
		Nicolás López
	</a>
</div>
<!-- /#sidebar-wrapper -->

<style>
	.tree {
		margin-left: 20px;
	}
	.tree .foldername a {
		cursor: pointer;
	}
	.tree .foldername .icon{
		width: 5px;
		margin-left: -20px;
		margin-right: 28px;
	}
	.toolkit a {
		cursor: pointer;
	}
	.sidebar-nav li.toolkit a:hover {
		background: #000;
	}
	.sidebar-nav li.tree-container a:hover {
		background: #000;
	}
	.sidebar-nav li.tree-container a.selected {
		font-weight: 600;
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