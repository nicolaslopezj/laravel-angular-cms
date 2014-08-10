angular.module('cmsApp.controllers')

.controller('ViewsController', ['$rootScope', '$scope', 'View', function($rootScope, $scope, View) {

	$rootScope.views = View.all();

	$scope.editor_loaded = false;
	$scope.editor = ace.edit("content");
	$scope.editor.getSession().setMode("ace/mode/php");
	$scope.editor.setOptions({
	    readOnly: true,
	    highlightActiveLine: false,
	    highlightGutterLine: false
	});
	$scope.editor.getSession().on('change', function(){
		var newContent = $scope.editor.getSession().getValue();

		if ($scope.editor_loaded) {
			if ($rootScope.activeView.content != newContent) {
				if(!$scope.$$phase) {
					$scope.$apply(function(){
						$rootScope.activeView.has_changes = true;
					})
				}
			};
			$rootScope.activeView.content = newContent;
		};

		if (newContent.trim() && !$scope.editor_loaded) {
			$scope.editor_loaded = true;
		}


	});

	$rootScope.$watch('activeView', function(newValue, oldValue){
		if (newValue) {
			$scope.editor_loaded = false;
			$scope.editor.getSession().setValue(newValue.content);
			$scope.editor.setOptions({
			    readOnly: false,
			    highlightActiveLine: true,
			    highlightGutterLine: true
			});
		} else {
			$scope.editor.setOptions({
			    readOnly: true,
			    highlightActiveLine: false,
			    highlightGutterLine: false
			});
		}
	});

	$scope.changeName = function(view) {
		var newName = prompt("Enter the name", view.name);
		if (newName) {
			view.name = newName;
			view.has_changes = true;

		}
	}

	$scope.changeTag = function(view) {
		var newTag = prompt("Enter the tag", view.tag);
		if (newTag) {
			view.tag = newTag;
			view.has_changes = true;
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
