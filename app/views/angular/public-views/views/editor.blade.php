<div ng-controller="ViewsController">

	<div>
		<div class="actions clearfix">
			<div class="row" ng-show="activeView">
				<div class="col-xs-9">
					<p class="file-description-container">
						<span class="file-name">
							<span class="text-muted">site/</span><span class="name" ng-click="changeName(activeView)">@{{ activeView.name }}</span><span class="text-muted">.blade.php</span>
						</span>
						<span class="file-tag">
							<span class="label" ng-class="{'label-danger':activeView.tag, 'label-default':!activeView.tag}" ng-click="changeTag(activeView)">
								<span ng-show="activeView.tag">@{{ activeView.tag }}</span>
								<span ng-show="!activeView.tag" style="font-style: italic">set tag</span>
							</span>
						</span>
					</p>
				</div>
				<div class="col-xs-3">
					<div class="btn-group pull-right">
						<button class="btn btn-danger" ng-click="deleteView(activeView)">
							Delete
						</button>
						<button class="btn btn-primary" ng-click="saveView(activeView)" 
						ng-disabled="activeView.has_changes !== true">
							Save
						</button>
					</div>
				</div>
			</div>
			<div class="row" ng-show="!activeView">
				<div class="col-xs-9">
					<p class="file-description-container">
						<span class="file-name">
							<span class="text-muted">Select a file</span>
						</span>
					</p>
				</div>
			</div>
		</div>
		<div class="editor" ng-model="activeView.content" readonly="@{{ !canEdit }}" ui-ace="{onLoad: aceLoaded}"></div>
	</div>
</div>
<script type="text/javascript">
	function setHeight() {
		var windowHeight = $(window).height();

		$(".editor").height(windowHeight - 98);
	}

	$(document).ready(function(){
		setHeight();
		$(window).resize(function() {
			setHeight();
		});
	});
</script>
<style type="text/css" media="screen">
    .navbar {
    	margin-bottom: 0px;
    }
    .actions {
    	background-color: #f0f0f0;
    	overflow: hidden;
    	height: 43px;
    }
    .actions .file-description-container {
    	padding-top: 5px;
    }
    .actions .file-name {
		margin-left: 10px;
		font-size: 20px;
    }
    .actions .file-name .name{
    	cursor: pointer;
    }
    .file-tag{
    	position: relative;
		top: -2px;
		margin-left: 10px;
		font-size: 16px;
		cursor: pointer;
    }
</style>