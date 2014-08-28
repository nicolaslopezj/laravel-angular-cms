angular.module('cmsApp.controllers')

.controller('TreeController', ['$rootScope', '$scope', '$window', 'File', 'FolderLink', 'FileLink', function($rootScope, $scope, $window, File, FolderLink, FileLink) {

	$rootScope.currentPath = [];
	$rootScope.foldersInCurrentPath = [];
	$rootScope.files = File.all();
	$rootScope.folder_links = FolderLink.all();
	$rootScope.file_links = FileLink.all();

	$rootScope.$watch('currentPath', function(newValue) {
		parseFoldersInCurrentPath();
	}, true);

	$rootScope.$watch('files', function(newValue) {
		parseFoldersInCurrentPath();
	}, true);

	function parseFoldersInCurrentPath() {
		var folders = [];
		var currentPath = $rootScope.currentPath;
		var pathString = currentPath.join('/');
		for (var i = 0; i < $rootScope.files.length; i++) {
			var file = $rootScope.files[i];
			if (!file.path.equals(currentPath) && file.name.substring(0, pathString.length) === pathString) {
				var folder = file.path[currentPath.length];
				folders.push(folder);
			};
		}

		$rootScope.foldersInCurrentPath = folders.reduce(function(a,b){
			if (a.indexOf(b) < 0 ) a.push(b);
			return a;
		},[]);
	}

	$rootScope.folderLinksWithPath = function(path) {
		return $rootScope.folder_links.reduce(function(a,b){
			if (b.path == path) a.push(b);
			return a;
		},[]);
	}

	$rootScope.fileLinksOfFile = function(file) {
		return $rootScope.file_links.reduce(function(a,b){
			if (!file) {return []};
			if (b.file_id == file.id) a.push(b);
			return a;
		},[]);
	}

	$scope.createFolder = function() {
		var newFolder = prompt("Enter the folder name");
		if (newFolder) {
			$scope.openFolder(newFolder);
		}
	}

	$scope.openFolder = function(folder) {
		$scope.closeActiveFile();
		$rootScope.currentPath.push(folder);
	}

	$scope.upFolder = function(levels) {
		$scope.closeActiveFile();
		for (var i = 0; i < levels; i++) {
			$rootScope.currentPath.pop();
		};
	}

	$scope.openFile = function(fileId) {
		for (var i = 0; i < $rootScope.files.length; i++) {
			if ($rootScope.files[i].id == fileId) {
				$rootScope.activeFile = $rootScope.files[i];
			};
		}
	}

	$scope.closeActiveFile = function() {
		delete $rootScope.activeFile;
	}

	$scope.isInCurrentPath = function(file) {
		var path = $rootScope.currentPath;
		return file.path.equals(path);
	}

}])
.filter('icon', function() {
	return function(file) {
		if (file.extension.isOneOf(['jpg', 'png', 'jpeg', 'gif', 'bmp', 'psd'])) {return 'fa-file-image-o';};
		if (file.extension.isOneOf(['pdf'])) {return 'fa-file-pdf-o';};
		if (file.extension.isOneOf(['zip', 'rar'])) {return 'fa-file-archive-o';};
		if (file.extension.isOneOf(['mp3', 'aac', 'wav', 'aiff'])) {return 'fa-file-audio-o';};
		if (file.extension.isOneOf(['aaf', '3gp', 'mp4', 'mkv', 'avi', 'flv', 'm4v', 'mov'])) {return 'fa-file-video-o';};
		if (file.extension.isOneOf(['xls', 'csv', 'xlsx', 'numbers'])) {return 'fa-file-excel-o';};
		if (file.extension.isOneOf(['ppt', 'pptx', 'key'])) {return 'fa-file-powerpoint-o';};
		if (file.extension.isOneOf(['php', 'js', 'json', 'xml', 'cpp', 'c', 'h', 'py', 'java', 'sql'])) {return 'fa-file-code-o';};
		if (file.extension.isOneOf(['txt', 'pages'])) {return 'fa-file-text-o'}
		if (file.extension.isOneOf(['doc', 'docx', ''])) {return 'fa-file-word-o';}
		return 'fa-file-o';
	};
});

String.prototype.isOneOf = function(array) {
	for (var i = 0; i < array.length; i++) {
		if (this == array[i]) {return true};
	};
	return false;
}

Array.prototype.equals = function (array) {
    if (!array)
        return false;

    if (this.length != array.length)
        return false;

    for (var i = 0, l=this.length; i < l; i++) {
        if (this[i] instanceof Array && array[i] instanceof Array) {
            if (!this[i].equals(array[i]))
                return false;       
        }           
        else if (this[i] != array[i]) { 
            return false;   
        }           
    }       
    return true;
}  