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
		$scope.editor = _editor;
	};

	function setAceMode(fileName) {
		if (!fileName) {return;};
		var parts = fileName.split('.');
		if (!parts.length) {return;};
		var extension = parts[parts.length - 1];
		var mode = 'ace/mode/html';
		if (extension == 'html') {
			mode = 'ace/mode/html';
		} else if (extension == 'php') {
			mode = 'ace/mode/php';
		} else if (extension == 'css') {
			mode = 'ace/mode/css';
		} else if (extension == 'js') {
			mode = 'ace/mode/javascript';
		}

		$scope.editor.setOptions({
			mode: mode
		});
	}

	$scope.canEdit = false;
	$rootScope.$watch('activeView', function(newValue, oldValue){
		if (newValue) {
			if (newValue.id) {$scope.canEdit = true;} else {$scope.canEdit = false;};
			
			if (oldValue) {
				if (newValue.id != oldValue.id) {
					// Es nueva clase
					setAceMode(newValue.name);
				} else {
					// Es clase antigua
					if (oldValue.has_changes != true) {
						newValue.has_changes = true;
					};
				}
			} else {
				// Es nueva clase
				setAceMode(newValue.name);
			}
		} else {
			// No hay clase
			$scope.canEdit = false;
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
			for (var i = 0; i < $rootScope.views.length; i++) {
				if ($rootScope.views[i].id == view.id) {

					if ($rootScope.activeView.id == view.id) {
						$rootScope.activeView = null;
					};

					$rootScope.views.splice(i, 1);
				};
			}

			view.$delete();
		} else {
		    
		}
	}

}])
