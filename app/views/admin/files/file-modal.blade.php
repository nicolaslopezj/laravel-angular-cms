<div class="modal-header">
    <h3 class="modal-title">{{ trans('admin.File_Download_Link') }}</h3>
</div>
<div class="modal-body">
    <div class="form-group">
    	<label>{{ trans('admin.Link_Name') }}</label>
    	<input class="form-control" ng-model="fileLink.name">
    </div>
    <div class="form-group">
        <label>{{ trans('admin.Max_Downloads') }}</label>
        <input class="form-control" ng-model="fileLink.max_downloads">
    </div>
    <div class="form-group">
    	<label>{{ trans('admin.Expires_On') }}</label>
    	<input class="form-control" ng-model="fileLink.expires_on">
    </div>
    <div class="form-group">
    	<label>{{ trans('admin.Title') }}</label>
    	<input class="form-control" ng-model="fileLink.title">
    </div>
    <div class="form-group">
    	<label>{{ trans('admin.Description') }}</label>
    	<textarea class="form-control" ng-model="fileLink.description"></textarea>
    </div>
</div>
<div class="modal-footer">
    <button class="btn btn-primary" ng-click="ok()">{{ trans('admin.Ok') }}</button>
</div>