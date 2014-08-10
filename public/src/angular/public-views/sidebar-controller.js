angular.module('cmsApp.controllers')

.controller('SidebarController', ['$rootScope', '$scope', '$window', function($rootScope, $scope, $window) {

	$rootScope.$watch('views', function() {
		if (!$rootScope.activeView && $window.location.hash && $rootScope.views) {
			for (var i = 0; i < $rootScope.views.length; i++) {
				if ("#" + $rootScope.views[i].id == $window.location.hash) {
					$rootScope.activeView = $rootScope.views[i];
				};
			}
		};
	}, true);

	$scope.openView = function(viewId) {
		for (var i = 0; i < $rootScope.views.length; i++) {
			if ($rootScope.views[i].id == viewId) {
				$rootScope.activeView = $rootScope.views[i];
			};
		}
	};

}])