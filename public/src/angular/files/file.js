angular.module('cmsApp.services')

.factory('File', ['$rootScope', '$resource', function($rootScope, $resource){
	return $resource($rootScope.main_url + '/files/:fileId', {fileId:'@id'},
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
}])

.factory('FileLink', ['$rootScope', '$resource', function($rootScope, $resource){
	return $resource($rootScope.main_url + '/file-links/:linkId', {linkId:'@id'},
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
}])

.factory('FolderLink', ['$rootScope', '$resource', function($rootScope, $resource){
	return $resource($rootScope.main_url + '/folder-links/:linkId', {linkId:'@id'},
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
}])