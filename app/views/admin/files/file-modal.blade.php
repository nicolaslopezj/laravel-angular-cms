<div class="modal-header">
    <h3 class="modal-title">File Download Link</h3>
</div>
<div class="modal-body">
    <div class="form-group">
    	<label>Link Name</label>
    	<input class="form-control" ng-model="fileLink.name">
    </div>
    <div class="form-group">
        <label>Max Downloads</label>
        <input class="form-control" ng-model="fileLink.max_downloads">
    </div>
    <div class="form-group">
    	<label>Expires On (Format: "yyyy-mm-dd HH:ii:ss")</label>
    	<input class="form-control" ng-model="fileLink.expires_on">
    </div>
    <div class="form-group">
    	<label>Title</label>
    	<input class="form-control" ng-model="fileLink.title">
    </div>
    <div class="form-group">
    	<label>Description</label>
    	<textarea class="form-control" ng-model="fileLink.description"></textarea>
    </div>
</div>
<div class="modal-footer">
    <button class="btn btn-primary" ng-click="ok()">OK</button>
</div>