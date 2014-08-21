angular.module('cmsApp.controllers')

.controller('RoutesController', ['$rootScope', '$scope', 'Route', function($rootScope, $scope, Route) {

	$rootScope.routes = Route.all();

	$(window).bind('keydown', function(event) {
		if ((event.ctrlKey || event.metaKey) && event.which == 83) {
			$scope.saveRoute($scope.activeRoute);
			event.preventDefault();
		};
	});

	$scope.aceLoaded = function(_editor) {
		_editor.setOptions({
			mode: 'ace/mode/javascript',
		});
		_editor.getSession().setUseWorker(false);
	};

	$rootScope.$watch('activeRoute', function(newValue, oldValue){
		if (newValue) {
			//if (newValue.id) {$scope.canEdit = true;} else {$scope.canEdit = false;};
			
			if (oldValue) {
				if (newValue.id != oldValue.id) {
					// Es nueva clase
				} else {
					// Es clase antigua
					if (oldValue.has_changes != true) {
						newValue.has_changes = true;
					};
				}
			} else {
				// Es nueva clase
			}
		} else {
			// No hay clase
			//$scope.canEdit = false;
		}
	}, true);

	$scope.saveRoute = function(route) {
		route.has_changes = false;
		if (route.is_new) {

			Route.create({}, route, function(response){
				route.id = response.id;
				route.is_new = false;
			}, function(response) {
				if (response.data.messages) {
					var messages = response.data.messages;
					for (var key in messages) {
					   var message = messages[key];
					   alert(message);
					}
				};
			});

		} else {
			Route.update({'routeId': route.id}, route, function(response){
				
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
	}

	$scope.deleteRoute = function(route) {
		if (confirm('Are you sure you want delete this route?')) {
			for (var i = 0; i < $rootScope.routes.length; i++) {
				if ($rootScope.routes[i].id == route.id) {

					if ($rootScope.activeRoute.id == route.id) {
						$rootScope.activeRoute = null;
					};

					$rootScope.routes.splice(i, 1);
				};
			}

			route.$delete();
		} else {
		    
		}
	}

}])
