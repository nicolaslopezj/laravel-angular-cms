<div class="row">
	<div class="col-sm-12">
		<div ng-controller="ActiveFileController">
			<h3 style="margin-top: 0px;">
				<button class="btn btn-default btn-xs pull-right" ng-click="closeActiveFile()">{{ trans('admin.Hide') }}</button>
				<span class="box-icon" style="margin-right: 10px;"><i class="fa @{{ activeFile | icon }}"></i></span>
				<code>@{{ activeFile.filename }}</code>
			</h3>
			<hr>

			<p class="clearfix">
				<span tooltip="Downloads" class="label label-primary" style="position: relative; top: 1px; padding-top: 4px; padding-bottom: 5px;">@{{ activeFile.downloads }}</span>
				<a href="{{ route('admin.ajax.files.index') }}/@{{ activeFile.id }}/download" class="btn btn-default btn-xs">{{ trans('admin.Download') }}</a>
				<button ng-click="createFileLink(activeFile)" class="btn btn-primary btn-xs">{{ trans('admin.Create_Download_Link') }}</button>
				<button ng-click="changeFilePath(activeFile)" class="btn btn-warning btn-xs">{{ trans('admin.Change_Path') }}</button>
				<button ng-click="deleteFile(activeFile)" class="btn btn-danger btn-xs">{{ trans('admin.Delete') }}</button>
			</p>

			<div ng-show="fileLinksOfFile(activeFile).length > 0" style="margin-top: 40px;">
				<h4>{{ trans('admin.Shared_Links') }}</h4>
				<div ng-repeat="fileLink in fileLinksOfFile(activeFile)">
					<hr>	
					<div class="pull-right">
						<button class="btn btn-danger btn-xs" ng-click="deleteFileLink(fileLink)">{{ trans('admin.Delete') }}</button>
						<button class="btn btn-default btn-xs" ng-click="editFileLink(fileLink)">{{ trans('admin.Edit') }}</button>
					</div>
					<p class="link-name">
						<span ng-if="!fileLink.is_valid" tooltip="This link has expired" class="label label-danger" style="position: relative; top: -1px;">{{ trans('admin.Expired') }}</span>
						<span tooltip="Downloads" class="label label-primary" style="position: relative; top: -1px;">@{{ fileLink.downloads }}</span>
						<code>@{{ fileLink.name }}</code>
						<a href="@{{ fileLink.url }}" target="_BLANK" style="color: black;
						font-size: 16px;
						position: relative;
						top: 1px;
						left: 5px;"><i class="fa fa-external-link"></i></a>
					</p>
				</div>
			</div>

			<script type="text/ng-template" id="fileModal.html">
			@include('admin.files.file-modal')
			</script>
		</div>
	</div>
</div>