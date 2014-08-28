<div class="container">
	<div ng-controller="TreeController">
		
		<div class="row">
			<div class="col-sm-6 files-container">
				<div class="">
					@include('admin.files.files')
				</div>
			</div>
			<div class="col-sm-6 active-file-container">
				<div ng-if="activeFile">
					@include('admin.files.active-file')
				</div>
				<div ng-if="!activeFile">
					@include('admin.files.folder')
				</div>
				<div>
					@include('admin.files.uploads')
				</div>
			</div>
		</div>
	</div>
</div>

<style>
	.link-name a {
		color: black;
		font-size: 16px;
		position: relative;
		top: 1px;
		left: 5px;
	}
	.active-file-container {
		margin-top: 0px;
	}
	.path-name {
		margin-bottom: 20px;
		font-size: 20px;
	}
	a {
		cursor: pointer;
	}
	.truncate {
	  white-space: nowrap;
	  overflow: hidden;
	  text-overflow: ellipsis;
	}
	.no-select {
		-moz-user-select: none;
		-khtml-user-select: none;
		-webkit-user-select: none;
		-ms-user-select: none;
		user-select: none;
	}
</style>