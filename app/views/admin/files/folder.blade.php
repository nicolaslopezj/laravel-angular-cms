<div class="row">
	<div class="col-sm-12" ng-controller="FolderController">
		<div class="">
			<h3 style="margin-top: 0px;">
				<span class="box-icon" style="margin-right: 10px;"><i class="fa fa-folder-o"></i></span>
				<code ng-show="currentPath.length">@{{ currentPath.join('/') }}</code>
				<code ng-show="!currentPath.length">/</code>
			</h3>
			<hr>
			
			<p class="clearfix">
				<!--<button ng-show="currentPath.length" ng-click="createFolderLink(currentPath.join('/'))" class="btn btn-primary btn-xs">Share Folder</button>-->
				<button class="btn btn-primary btn-xs" ng-file-select="uploadFiles($files)" onclick="this.value=null">{{ trans('admin.Upload_Files') }}</button>
			</p>

			<div ng-show="folderLinksWithPath(currentPath.join('/')).length > 0" style="margin-top: 40px;">
				<h4>{{ trans('admin.Shared_Links') }}</h4>
				<div ng-repeat="folderLink in folderLinksWithPath(currentPath.join('/'))">
					<hr>
					<div class="pull-right">
						<button class="btn btn-danger btn-xs" ng-click="deleteFolderLink(folderLink)">{{ trans('admin.Delete') }}</button>
						<button class="btn btn-default btn-xs" ng-click="editFolderLink(folderLink)">{{ trans('admin.Files') }}</button>
					</div>
					<p class="link-name">
						<span ng-if="!fileLink.is_valid" tooltip="This link has expired" class="label label-danger" style="position: relative; top: -1px;">{{ trans('admin.Expired') }}</span>
						<span tooltip="Downloads" class="label label-primary" style="position: relative; top: -1px;">@{{ fileLink.downloads }}</span>
						<code>@{{ folderLink.name }}</code>
						<a href="@{{ folderLink.url }}" target="_BLANK" style="color: black;
						font-size: 16px;
						position: relative;
						top: 1px;
						left: 5px;"><i class="fa fa-external-link"></i></a>
					</p>
				</div>
			</div>
		</div>
		<script type="text/ng-template" id="folderModal.html">
		@include('admin.files.folder-modal')
		</script>
	</div>
</div>