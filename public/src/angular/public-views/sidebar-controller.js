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
		/*
		console.log(files);
		var prepared = [];
		var objects = [];
		var folders = [];
		var tree = [];
		_.each(files, function(file){
			prepared.push(file.split('/'));
		});
		_.each(prepared, function(file){
			var object = {
				name: _.last(file),
				path: _.initial(file),
			};
			objects.push(object);
		});
		console.log(objects, 'before');
		_.each(objects, function(file){
			if (objects.path.length > 0) {
				if (!tree['/']) {
					tree['/'] = [];
				};
				tree['/'].push(file);
				objects = _.without(objects, file);
			};
		});

		console.log(objects, 'after');
		console.log(tree, 'tree');
		*/
	}

	function parseFolder(dir) {

	}

	$scope.openView = function(viewId) {
		for (var i = 0; i < $rootScope.views.length; i++) {
			if ($rootScope.views[i].id == viewId) {
				$rootScope.activeView = $rootScope.views[i];
			};
		}
	};

}])

var _views = [];