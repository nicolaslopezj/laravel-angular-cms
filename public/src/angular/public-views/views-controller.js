angular.module('cmsApp.controllers')

.controller('ViewsController', ['$rootScope', '$scope', 'View', function($rootScope, $scope, View) {

	$rootScope.views = View.all();

	$(window).bind('keydown', function(event) {
		if ((event.ctrlKey || event.metaKey) && event.which == 83) {
			$scope.saveView($scope.activeView);
			event.preventDefault();
		};
	});

	$scope.aceLoaded = function(_editor) {
		_editor.setOptions({
			mode: 'ace/mode/php',
		});
	};

	$rootScope.$watch('activeView', function(newValue, oldValue){
		if (newValue) {
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
		}
	}, true);

	$scope.changeName = function(view) {
		var newName = prompt("Enter the name", view.name);
		if (newName) {
			view.name = newName;
		}
	}

	$scope.changeTag = function(view) {
		var newTag = prompt("Enter the tag", view.tag);
		if (newTag) {
			view.tag = newTag;
		}
	}

	$rootScope.newView = function() {
		var newName = prompt("Enter the name");
		if (newName) {
			var newView = {name: newName};
			View.create(newView, function(response) {
				var view = new View(response);
				$rootScope.views.push(view);
			}, function(response) {
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

	$scope.saveView = function(view) {
		view.has_changes = false;
		View.update({'viewId': view.id}, view, function(response){
			
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

	$scope.deleteView = function(view) {
		if (confirm('Are you sure you want delete this view?')) {
			view.$delete();
			for (var i = 0; i < $rootScope.views.length; i++) {

				$rootScope.activeView = null;
				$scope.editor_loaded = false;
				$scope.editor.getSession().setValue();
				

				if ($rootScope.views[i].id == view.id) {
					$rootScope.views.splice(i, 1);
				};
			}
		} else {
		    
		}
	}

}])
