angular	.module('app', [])
		.controller('mainCtrl', ["$scope", function($scope) {
			 var users = [
			 	{name: "Sam"},
			 	{name: "Jim"},
			 	{name: "Ben"},
			 	{name: "Sara"}
			 ];
			 $scope.users = users;
			 $scope.addUser = function() {
			 	$scope.users.push({name: this.username});
			 }
		}])
