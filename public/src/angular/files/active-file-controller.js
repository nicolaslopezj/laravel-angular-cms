angular.module('cmsApp.controllers')

.controller('ActiveFileController', ['$rootScope', '$scope', '$modal', 'FileLink', 'File', function($rootScope, $scope, $modal, FileLink, File) {

	$scope.changeFilePath = function(file) {
		var newName = prompt("Enter the file path", file.name);
		if (newName) {
			file.name = newName;
			var path = newName.split('/');
			file.filename = path.pop();
			file.path = path;
		}
		$scope.saveFile(file);
	}

	$scope.saveFile = function(file) {
		File.update({'fileId': file.id}, file, function(response){

		}, function(response) {
			if (response.data.messages) {
				var messages = response.data.messages;
				for (var key in messages) {
				   var message = messages[key];
				   alert(message);
				}
			};
		});
	}

	$scope.deleteFile = function(file) {
		if (confirm('Are you sure you want delete this file?')) {
			for (var i = 0; i < $rootScope.files.length; i++) {
				if ($rootScope.files[i].id == file.id) {

					if ($rootScope.activeFile.id == file.id) {
						$scope.closeActiveFile();
					};

					$rootScope.files.splice(i, 1);
				};
			}

			file.$delete();
		} else {
		    
		}
	}

	$scope.createFileLink = function(file) {
		var newFileLink = {file_id: file.id};
		FileLink.create(newFileLink, function(response) {
			var fileLink = new FileLink(response);
			$rootScope.file_links.push(fileLink);
			$scope.editFileLink(fileLink);
		}, function(response) {
			if (response.data.messages) {
				var messages = response.data.messages;
				for (var key in messages) {
				   var message = messages[key];
				   alert(message);
				}
			};
		});

	}

	$scope.deleteFileLink = function(fileLink) {
		if (confirm('Are you sure you want delete this download link?')) {
			for (var i = 0; i < $rootScope.file_links.length; i++) {
				if ($rootScope.file_links[i].id == fileLink.id) {
					$rootScope.file_links.splice(i, 1);
				};
			}

			fileLink.$delete();
		} else {
		    
		}
	}

	$scope.editFileLink = function(fileLink) {
		var modalInstance = $modal.open({
			templateUrl: 'fileModal.html',
			controller: 'FileModalController',
			resolve: {
				fileLink: function() {
					return fileLink;
				},
			}
		});

		modalInstance.result.then(function (fileLink) {
			FileLink.update({'linkId': fileLink.id}, fileLink, function(response){
				for (var i = 0; i < $rootScope.file_links.length; i++) {
					if ($rootScope.file_links[i].id == response.id) {
						$rootScope.file_links[i] = new FileLink(response);
					};
				}
			}, function(response) {
				if (response.data.messages) {
					var messages = response.data.messages;
					for (var key in messages) {
					   var message = messages[key];
					   alert(message);
					}
				};
			});
		});
	}



}])

.controller('FileModalController', ['$rootScope', '$scope', 'FileLink', '$modalInstance', 'fileLink', function($rootScope, $scope, FileLink, $modalInstance, fileLink) {

	$scope.fileLink = fileLink;

	$scope.ok = function () {
		$modalInstance.close(fileLink);
	};

	$scope.cancel = function () {
		$modalInstance.dismiss('cancel');
	};

}])