<div class="files-container no-select">
	<div class="pull-right">
		<span class="create-folder-btn">
			<button class="btn btn-default btn-xs" ng-click="createFolder()"><i class="fa fa-plus"></i></button>
		</span>
	</div>
	<div class="path-name">
		<span ng-click="upFolder(currentPath.length)" ng-class="{'as_link': currentPath.length > 0}">Files</span>
		<span ng-repeat="folder in currentPath"> 
			<span class="chevron"><i class="fa fa-chevron-right"></i></span>
			<span ng-click="upFolder(currentPath.length - $index - 1)" ng-class="{'as_link': currentPath.length > $index + 1}">@{{ folder }}</span>
		</span>
	</div>

	<hr>
	
	<div ng-repeat="folder in foldersInCurrentPath">
		<div class="box" ng-click="openFolder(folder)">
			<span class="box-icon"><i class="fa fa-folder-o"></i></span>
			<span class="box-name truncate">
				@{{ folder }}
			</span>
		</div>
	</div>
	<div ng-repeat="file in files | filter:isInCurrentPath | orderBy:'filename'">
		<div class="box" ng-class="{active: file.id == activeFile.id}" ng-click="openFile(file.id)">
			<span class="box-icon"><i class="fa @{{ file | icon }}"></i></span>
			<span class="box-name truncate">
				@{{ file.filename }}
			</span>
		</div>
	</div>
</div>
<style>
.create-folder-btn {
	margin-top: 10px;
}
.path-name {
	cursor: default;
}
.chevron {
	position: relative;
	font-size: 13px;
	color: #404040;
	margin-left: 5px;
	margin-right: 5px;
	top: -1px;
}
.as_link {
	color: #2780e3;
	cursor: pointer;
}
.as_link:hover {
	color: #165ba8;
	text-decoration: underline;
}
.files-container .box {
	color: #555;
	height: 50px;
	border-radius: 4px;
	cursor: pointer;
}
.files-container .box:hover {
	background-color: #EDEDED;
}
.files-container .box.active {
	background-color: #EAEAEA;
}
.files-container .box-icon {
	font-size: 25px;
	position: relative;
	top: 7px;
	left: 10px;
}
.files-container .box-name {
	font-size: 18px;
	position: relative;
	left: 17px;
	top: 4px;
}
</style>