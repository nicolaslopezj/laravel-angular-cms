<div class="modal-header">
    <h3 class="modal-title">Shared Folder</h3>
</div>
<div class="modal-body">
    <div class="form-group">
    	<label>Link Name</label>
    	<input class="form-control" ng-model="folderLink.name">
    </div>
    <div class="form-group">
    	<label>Expires On (Format: "yyyy-mm-dd HH:ii:ss")</label>
    	<input class="form-control" ng-model="folderLink.expires_on">
    </div>
    <div class="form-group">
    	<label>Title</label>
    	<input class="form-control" ng-model="folderLink.title">
    </div>
    <div class="form-group">
    	<label>Description</label>
    	<textarea class="form-control" ng-model="folderLink.description"></textarea>
    </div>
</div>
<div class="modal-footer">
    <button class="btn btn-primary" ng-click="ok()">OK</button>
</div>