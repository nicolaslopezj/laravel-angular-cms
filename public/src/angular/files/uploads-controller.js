angular.module('cmsApp.controllers')

.controller('UploadsController', ['$rootScope', '$scope', '$upload', function($rootScope, $scope, $upload) {

	$rootScope.uploads = [];

	$rootScope.uploadFiles = function($files) {
		console.log($files);
		for (var i = 0; i < $files.length; i++) {
			var file = $files[i];
			var upload = {};
			$rootScope.uploads.push(upload);

			upload.aborted = false;
			upload.hidden = false;
			upload.file = file;
			upload.progress = 0;
			upload.path = $rootScope.currentPath.join('/');

			upload.upload = $upload.upload({
				url: $rootScope.main_url + '/files',
				data: {path:upload.path},
				file: file,
			})
			.progress(function(evt) {
				upload.active = true;
				upload.progress = 100.0 * evt.loaded / evt.total;
				console.log(upload, upload.file.name);
			})
			.error(function(data, status, headers, config) {
				upload.active = false;
				upload.error = data;
				console.log(upload, 'Error');
			})
			.success(function(data, status, headers, config) {
				upload.active = false;
				upload.success = data;
				$rootScope.files.push(data);
				console.log(upload, 'Success');
			})

			upload.cancel = function() {
				upload.aborted = true;
				upload.upload.abort();
			}

			upload.hide = function() {
				upload.hidden = true;
				for (var i = $rootScope.uploads.length - 1; i >= 0; i--) {
					if ($rootScope.uploads[i].hidden = false) {
						return;
					}
				};
				$rootScope.uploads = [];
			}
		}
	};

}])