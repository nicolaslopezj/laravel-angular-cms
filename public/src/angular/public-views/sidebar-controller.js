angular.module('cmsApp.controllers')

.controller('SidebarController', ['$rootScope', '$scope', '$window', function($rootScope, $scope, $window) {

	$scope.directory = [];

	$rootScope.$watch('views', function() {
		if (!$rootScope.activeView && $window.location.hash && $rootScope.views) {
			for (var i = 0; i < $rootScope.views.length; i++) {
				if ("#" + $rootScope.views[i].id == $window.location.hash) {
					$rootScope.activeView = $rootScope.views[i];
				};
			}
		};

		var paths = [];
		for (var i = 0; i < $rootScope.views.length; i++) {
			paths.push($rootScope.views[i].name);
		}
		$scope.parseDirectory(paths);
	}, true);

	$scope.parseDirectory = function(files) {
		var tree = {};
		var _files = [];
		for (index in files) {
			var path = 'site/' + files[index];
			var parts = path.split("/");
			var name = parts[parts.length - 1];
			parts.splice(parts.length - 1, 1);
			var file = {
				path:parts,
				name:name
			}
			_files.push(file);
			console.log(file, path);
		}


	}

	$scope.openView = function(viewId) {
		for (var i = 0; i < $rootScope.views.length; i++) {
			if ($rootScope.views[i].id == viewId) {
				$rootScope.activeView = $rootScope.views[i];
			};
		}
	};

}])