angular.module('cmsApp.controllers')

.controller('SidebarController', ['$rootScope', '$scope', '$window', function($rootScope, $scope, $window) {

	
	$rootScope.$watch('routes', function() {

	}, true);

	$scope.newRoute = function() {
		var route = {is_new:true, has_changes: true};
		if ($rootScope.routes) {
			$rootScope.routes.push(route);
		} else {
			$rootScope.routes = [route];
		};
	}

	$scope.openRoute = function(route) {
		$rootScope.activeRoute = route;
	}


}])