<br><br><br>
<div class="row">
	<div class="col-sm-12" ng-controller="UploadsController">
		<div class="" ng-show="uploads.length > 0">
			<h3>
				{{ trans('admin.Uploads') }}
			</h3>
			<div ng-repeat="upload in uploads">
				<hr>
				<div ng-show="!upload.hidden" class="">
					<div class="progress progress-striped" ng-class="{active:upload.active}">
						<div class="progress-bar" style="width: @{{ upload.progress }}%"></div>
					</div>
					<button class="pull-right btn btn-danger btn-xs" ng-show="upload.active" ng-click="upload.cancel()">{{ trans('admin.Abort') }}</button>
					<button class="pull-right btn btn-default btn-xs" ng-show="!upload.active" ng-click="upload.hide()">{{ trans('admin.Hide') }}</button>
					<p class="truncate">@{{ upload.path }}/@{{ upload.file.name }}</p>
				</div>
			</div>
		</div>
	</div>
</div>