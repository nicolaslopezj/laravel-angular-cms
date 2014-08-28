angular.module('cmsApp.controllers')

.controller('FolderController', ['$rootScope', '$scope', '$modal', 'FolderLink', function($rootScope, $scope, $modal, FolderLink) {

	$scope.createFolderLink = function(path) {
		var newFolderLink = {path: path};
		FolderLink.create(newFolderLink, function(response) {
			var folderLink = new FolderLink(response);
			$rootScope.folder_links.push(folderLink);
			$scope.editFolderLink(folderLink);
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

	$scope.deleteFolderLink = function(folderLink) {
		if (confirm('Are you sure you want delete this shared folder link?')) {
			for (var i = 0; i < $rootScope.folder_links.length; i++) {
				if ($rootScope.folder_links[i].id == folderLink.id) {

					$rootScope.folder_links.splice(i, 1);
				};
			}

			folderLink.$delete();
		} else {
		    
		}
	}

	$scope.editFolderLink = function(folderLink) {
		var modalInstance = $modal.open({
			templateUrl: 'folderModal.html',
			controller: 'FolderModalController',
			resolve: {
				folderLink: function() {
					return folderLink;
				},
			}
		});

		modalInstance.result.then(function (folderLink) {
			FolderLink.update({'linkId': folderLink.id}, folderLink, function(response){
				for (var i = 0; i < $rootScope.folder_links.length; i++) {
					if ($rootScope.folder_links[i].id == response.id) {
						$rootScope.folder_links[i] = new FolderLink(response);
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

.controller('FolderModalController', ['$rootScope', '$scope', 'FolderLink', '$modalInstance', 'folderLink', function($rootScope, $scope, FolderLink, $modalInstance, folderLink) {

	$scope.folderLink = folderLink;

	$scope.ok = function () {
		$modalInstance.close($scope.folderLink);
	};

	$scope.cancel = function () {
		$modalInstance.dismiss('cancel');
	};

}])