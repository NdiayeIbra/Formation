angular	.module('app', [])
		.controller('mainCtrl', ["$scope", function($scope) {
			 var users = [
			 	{name: "Sam"},
			 	{name: "Jim"},
			 	{name: "Ben"},
			 	{name: "Sara"}
			 ];
			 $scope.users = users;
		}])

angular	.module('app2', [])
		.controller('mainCtrl', ["$scope", function($scope) {
			 var users = [
			 	{name: "Sam", email: "sam@gmail.com"},
			 	{name: "Jim", email: "jim@gmail.com"},
			 	{name: "Ben", email: "ben@gmail.com"},
			 	{name: "Sara", email: "sara@gmail.com"}
			 ];
			 $scope.users = users;
		}])
		
		
