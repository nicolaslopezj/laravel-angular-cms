angular.module('cmsApp.services')

.factory('Route', ['$rootScope', '$resource', function($rootScope, $resource){
	return $resource($rootScope.main_url + '/public-routes/:routeId', {routeId:'@id'},
		{
			all: {
				method: 'GET',
				isArray: true,
			},
			update: {
				method: 'PUT'
			},
			create: {
				method: 'POST'
			}
		});
}]);