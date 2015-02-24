angular	.module('app', [])
		.controller('mainCtrl', [function() {
			this.name = "Jim"
		}])
		.controller('otherCtrl', ['$scope', function($scope) {
			$scope.name = "Sam";
		}]);
