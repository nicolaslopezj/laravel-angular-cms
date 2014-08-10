angular.module('cmsApp.services')

.factory('View', ['$rootScope', '$resource', function($rootScope, $resource){
	return $resource($rootScope.main_url + '/public-views/:viewId', {viewId:'@id'},
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