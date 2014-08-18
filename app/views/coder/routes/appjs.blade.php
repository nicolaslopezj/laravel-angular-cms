var cmsApp = angular.module('cmsApp', [
	'ngResource',
	'cmsApp.route',
	'cmsApp.api',
	'cmsApp.modules',
	'ngSanitize',
	{{ Dict::get('angular_extensions') }}
	]);

angular.module('cmsApp.modules', []);

angular.module('cmsApp.route', ['ngRoute', 'route-segment', 'view-segment'])
.config(['$routeProvider', '$routeSegmentProvider', '$locationProvider', function($routeProvider, $routeSegmentProvider, $locationProvider) {

	$locationProvider
		.html5Mode(true)
		.hashPrefix('!');

@foreach ($routes as $route)
	$routeSegmentProvider
		.when('/{{ $route->path }}','{{ $route->name }}');
@endforeach

@foreach ($routes as $route)
	$routeSegmentProvider
@foreach ($route->segments as $index => $segment)
@if($index != count($route->segments) - 1)		.within('{{ $segment }}')@else 
		.segment('{{ $segment }}', {
		    templateUrl: '{{ asset('site') }}/{{ $route->template }}',
		    controller: '{{ $route->controller }}',
@if($route->is_default)
			default:true,
@endif
@if($route->resolve)
			resolve:
{{ $route->resolve }},
@endif
@if($route->until_resolved)
			untilResolved: {
                templateUrl: '{{ asset('site') }}/{{ $route->until_resolved }}'
            },
@endif
@if($route->dependencies)
			dependencies: {{ json_encode($route->dependencies) }},
@endif
		})
@endif
@endforeach

@endforeach

	}
])

angular.module('cmsApp.api', [])
@foreach ($entities as $entity)
.factory('{{ $entity->model_name }}', ['$resource', function($resource){
	return $resource('{{ route('api.entity.index', $entity->route_name) }}/:id', {id:'@id'},
		{
			all: {
				method: 'GET',
				isArray: true,
				cache: {{ Dict::get('use_cache_api', false) ? 'true' : 'false' }},
			},
			paginate: {
				method: 'GET',
				params: {
					'paginate': 20,
					'page': 1,
				},
				cache: {{ Dict::get('use_cache_api', false) ? 'true' : 'false' }},
			},
			get: {
				method: 'GET',
				cache: {{ Dict::get('use_cache_api', false) ? 'true' : 'false' }},
			}
		});
}])
@endforeach

.factory('Definitions', ['$resource', function($resource){
	return $resource('{{ route('api.definitions.index') }}', {},
		{
			all: {
				method: 'GET',
				isArray: true,
			}
		});
}])
.controller('CMSMainController', ['$rootScope', 'Definitions', function($rootScope, Definitions) {
    $rootScope.definitions = Definitions.all();
    var findDict = function(identifier) {
   		for (index in $rootScope.definitions)
   		{
   			var item = $rootScope.definitions[index];
   			if (item.identifier == identifier) {
   				return item;
   			};
   		}
   	}

   	var getDefaultImage = function(width, height) {
   		var image = {
   			path: 'http://lorempixel.com/' + width + '/' + height + '/',
   			thumbnail_xs: 'http://lorempixel.com/50/50/',
   			thumbnail_sm: 'http://lorempixel.com/100/100/',
   			thumbnail_md: 'http://lorempixel.com/200/200/',
   			thumbnail_lg: 'http://lorempixel.com/400/400/',
   		};
   		return image;
   	}

    $rootScope.getDict = function(identifier, defaultValue) {
    	var definition = findDict(identifier);

    	if (!definition) {
    		return defaultValue;
    	};

    	if (!definition[definition.type]) {

			if (definition.type == 'image') {
				if (defaultValue) {
					var parts = defaultValue.split('x')
					return getDefaultImage(parts[0], parts[1]);
				}
			}

			if (definition.type == 'boolean') {
				if (definition[definition.type] === false) {
					return false;
				};
			}

			return defaultValue;
		}

		return definition[definition.type];
    }
}])

.directive('markdown', function ($sanitize) {
    return {
    	restrict: 'A',
        link: function (scope, element, attrs) {
            function renderMarkdown() {
                var htmlText = markdown.toHTML(scope.$eval(attrs.markdown)  || '');
                element.html($sanitize(htmlText));
            }
            scope.$watch(attrs.markdown, function(){
                renderMarkdown();
            });
            renderMarkdown();
        }
    };

});


