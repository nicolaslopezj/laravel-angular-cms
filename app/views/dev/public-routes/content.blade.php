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
							{{ trans('dev.Delete') }}
						</button>
						<button class="btn btn-primary" ng-click="saveRoute(activeRoute)"
						ng-disabled="activeRoute.has_changes !== true">
							{{ trans('dev.Save') }}
						</button>
					</div>
				</div>
			</div>
			<div class="row" ng-show="!activeRoute">
				<div class="col-xs-9">
					<p class="file-description-container">
						<span class="file-name">
							<span class="text-muted">{{ trans('dev.Route_Select') }}</span>
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

				<h3>{{ trans('dev.Route') }}</h3>
				<hr><br>

				<div class="form-group">
					<label>{{ trans('dev.Name') }}</label>
					<input ng-model="activeRoute.name" class="form-control">
				</div>

				<div class="form-group">
					<label>{{ trans('dev.Path') }}</label>
					<div class="input-group">
						<span class="input-group-addon">/</span>
						<input ng-model="activeRoute.path" class="form-control">
					</div>
				</div>

				<div class="form-group">
					<label>{{ trans('dev.Template') }}</label>
					<div class="input-group">
						<span class="input-group-addon">site/</span>
						<input ng-model="activeRoute.template" class="form-control" typeahead="templates for templates in getTemplates($viewValue)" typeahead-loading="loadingLocations">
					</div>
				</div>

				<div class="form-group">
					<label>{{ trans('dev.Loading_Template') }}</label>
					<div class="input-group">
						<span class="input-group-addon">site/</span>
						<input ng-model="activeRoute.until_resolved" class="form-control" typeahead="templates for templates in getTemplates($viewValue)" typeahead-loading="loadingLocations">
					</div>
				</div>

				<div class="form-group">
					<label>{{ trans('dev.Controller') }}</label>
					<input ng-model="activeRoute.controller" class="form-control">
				</div>

				<div class="form-group">
					<label>{{ trans('dev.Resolve') }}</label>
					<div class="editor" ng-model="activeRoute.resolve" ui-ace="{onLoad: aceLoaded}"></div>
				</div>

				<div class="form-group">
					<label>
						<input type="checkbox" ng-model="activeRoute.is_default">
						{{ trans('dev.Is_Default') }}
					</label>
				</div>

				<br><br>
				<h3>{{ trans('dev.SEO') }}</h3>
				<hr><br>

				<div class="form-group">
					<label>{{ trans('dev.Title') }}</label>
					<input ng-model="activeRoute.meta_title" class="form-control">
				</div>

				<div class="form-group">
					<label>{{ trans('dev.Description') }}</label>
					<input ng-model="activeRoute.meta_description" class="form-control">
				</div>

				<div class="form-group">
					<label>{{ trans('dev.Image') }}</label>
					<input ng-model="activeRoute.meta_image" class="form-control">
				</div>

				<div class="form-group">
					<label>{{ trans('dev.Meta_Tags') }}</label>
					<div class="editor" ng-model="activeRoute.meta_tags" ui-ace="{onLoad: aceLoaded}"></div>
				</div>

				<br><br>
				<div class="form-group">
					<label>
						<input type="checkbox" ng-model="activeRoute.directory_hidden">
						{{ trans('dev.Hidden_In_Directory') }}
					</label>
				</div>

				<div class="form-group">
					<label>{{ trans('dev.Directory') }}</label>
					<div class="editor" ng-model="activeRoute.directory" ui-ace="{onLoad: aceLoaded}"></div>
				</div>

				<hr>
				<div class="pull-right clearfix">
					<button class="btn btn-danger" ng-click="deleteRoute(activeRoute)">
						{{ trans('dev.Delete') }}
					</button>
					<button class="btn btn-primary" ng-click="saveRoute(activeRoute)"
					ng-disabled="activeRoute.has_changes !== true">
						{{ trans('dev.Save') }}
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