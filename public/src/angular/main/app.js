var cmsApp = angular.module('cmsApp', [
	'ngResource',
	'ui.ace',
	'ui.bootstrap',
	'cmsApp.controllers',
	'cmsApp.services',
	'angularFileUpload'
	]);

angular.module('cmsApp.controllers', []);
angular.module('cmsApp.services', ['ngResource']);