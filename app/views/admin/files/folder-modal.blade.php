<div class="modal-header">
    <h3 class="modal-title">{{ trans('admin.Shared_Folder') }}</h3>
</div>
<div class="modal-body">
    <div class="form-group">
    	<label>{{ trans('admin.Link_Name') }}</label>
    	<input class="form-control" ng-model="folderLink.name">
    </div>
    <div class="form-group">
    	<label>{{ trans('admin.Expires_On') }}</label>
    	<input class="form-control" ng-model="folderLink.expires_on">
    </div>
    <div class="form-group">
    	<label>{{ trans('admin.Title') }}</label>
    	<input class="form-control" ng-model="folderLink.title">
    </div>
    <div class="form-group">
    	<label>{{ trans('admin.Description') }}</label>
    	<textarea class="form-control" ng-model="folderLink.description"></textarea>
    </div>
</div>
<div class="modal-footer">
    <button class="btn btn-primary" ng-click="ok()">{{ trans('admin.Ok') }}</button>
</div>