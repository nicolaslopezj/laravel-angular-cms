angular.module('cmsApp.controllers')


.controller('SidebarController', ['$rootScope', '$scope', '$window', function($rootScope, $scope, $window) {

	$scope.directory = [];

	$rootScope.$watch('views', function(newValue) {
		if (!$rootScope.activeView && $window.location.hash && $rootScope.views) {
			for (var i = 0; i < $rootScope.views.length; i++) {
				if ("#" + $rootScope.views[i].id == $window.location.hash) {
					$rootScope.activeView = $rootScope.views[i];
				};
			}
		};
		if (newValue) {
			generateTree(newValue);
		};
		
	}, true);

	function generateTree(data) {
		$scope.tree = $scope.tree || {};

		function fillTree(file) {
			var cursor = $scope.tree;
			for (i in file.path) {
				var part = file.path[i];
				if (!cursor[part]) {
					cursor[part] = {is_folder:true, is_open:false};
				};
				cursor = cursor[part];
			}
			cursor[file.filename] = file;
		}

		for (i in data) {
			fillTree(data[i]);
		}
	
	}

	$scope.openView = function(viewId) {
		alert(viewId);
	};

}])

.directive("tree", function($compile) {
    return {
        restrict: "E",
        transclude: true,
        scope: {family: '='},
        controller: function($rootScope, $scope, $element, $filter) {
        	$rootScope.$watch('activeView', function(newValue) {
        		$scope.activeView = newValue;
        	});
        	$scope.openView = function(viewId) {
        		for (var i = 0; i < $rootScope.views.length; i++) {
					if ($rootScope.views[i].id == viewId) {
						$rootScope.activeView = $rootScope.views[i];
					};
				}
        	}
        },
        template:       
            '<div>' + 
                '<div ng-transclude></div>' +
                '<div class="tree" ng-repeat="(index, child) in family | orderBy:familyOrder">' +
                    '<div ng-if="child.is_folder">' +
	                    '<div class="foldername" ng-if="child.is_folder"><a ng-click="child.is_open = !child.is_open"><span class="icon pull-left"><i ng-show="!child.is_open" class="fa fa-caret-right"></i><i ng-show="child.is_open" class="fa fa-caret-down"></i></span><span class="text">{{ index }}</span></a></div>' +
	                    '<tree ng-if="child.is_folder" ng-show="child.is_open" family="child"><div ng-transclude></div></tree>' +
                    '</div>' +
                '</div>' +
                '<div class="tree" ng-repeat="(index, child) in family | orderBy:familyOrder">' +
                	'<div ng-if="!child.is_folder">' +
	                    '<div class="filename" ng-if="!child.is_folder"><a ng-class="{\'selected\': activeView.id == child.id, \'has-changes\': child.has_changes}" href="#{{ child.id }}" ng-click="openView(child.id)">{{ child.filename }}</a></div>' +
                    '</div>' +
                '</div>' +
            '</div>',
        compile: function(tElement, tAttr, transclude) {
            var contents = tElement.contents().remove();
            var compiledContents;
            return function(scope, iElement, iAttr) {

                if(!compiledContents) {
                    compiledContents = $compile(contents, transclude);
                }
                compiledContents(scope, function(clone, scope) {
                         iElement.append(clone); 
                });
            };
        }
    };
});