<div ng-controller="RoutesController">

	<div>
		<div class="actions clearfix">
			<div class="row" ng-show="activeRoute">
				<div class="col-xs-9">
					<p class="file-description-container">
						<span class="file-name">
							<span class="name">@{{ activeRoute.name }}</span>
						</span>
					</p>
				</div>
				<div class="col-xs-3">
					<div class="btn-group pull-right">
						<button class="btn btn-danger" ng-click="deleteRoute(activeRoute)">
							Delete
						</button>
						<button class="btn btn-primary" ng-click="saveRoute(activeRoute)" 
						ng-disabled="activeRoute.has_changes !== true">
							Save
						</button>
					</div>
				</div>
			</div>
			<div class="row" ng-show="!activeRoute">
				<div class="col-xs-9">
					<p class="file-description-container">
						<span class="file-name">
							<span class="text-muted">Select a route</span>
						</span>
					</p>
				</div>
			</div>
		</div>
	</div>
	<div class="container" ng-show="activeRoute">
		<br>
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3">
				
				<h3>Route</h3>
				<hr><br>

				<div class="form-group">
					<label>Name</label>
					<input ng-model="activeRoute.name" class="form-control">
				</div>

				<div class="form-group">
					<label>Path</label>
					<div class="input-group">
						<span class="input-group-addon">/</span>
						<input ng-model="activeRoute.path" class="form-control">
					</div>
				</div>

				<div class="form-group">
					<label>Template</label>
					<div class="input-group">
						<span class="input-group-addon">site/</span>
						<input ng-model="activeRoute.template" class="form-control">
					</div>
				</div>

				<div class="form-group">
					<label>Loading Template</label>
					<div class="input-group">
						<span class="input-group-addon">site/</span>
						<input ng-model="activeRoute.until_resolved" class="form-control">
					</div>
				</div>

				<div class="form-group">
					<label>Controller</label>
					<input ng-model="activeRoute.controller" class="form-control">
				</div>

				<div class="form-group">
					<label>Resolve (json)</label>
					<div class="editor" ng-model="activeRoute.resolve" ui-ace="{onLoad: aceLoaded}"></div>
				</div>

				<div class="form-group">
					<label>Meta Tags (json)</label>
					<div class="editor" ng-model="activeRoute.meta_tags" ui-ace="{onLoad: aceLoaded}"></div>
				</div>

				<div class="form-group">
					<label>
						<input type="checkbox" ng-model="activeRoute.is_default">
						Is Default
					</label>
				</div>

				<hr>
				<div class="pull-right clearfix">
					<button class="btn btn-danger" ng-click="deleteRoute(activeRoute)">
						Delete
					</button>
					<button class="btn btn-primary" ng-click="saveRoute(activeRoute)" 
					ng-disabled="activeRoute.has_changes !== true">
						Save
					</button>
					<br><br>
				</div>
			</div>
		</div>
	</div>
</div>
<style type="text/css" media="screen">
	.editor {
		height: 150px;
	}
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