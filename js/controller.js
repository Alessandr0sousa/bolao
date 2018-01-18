var app = angular.module("main-app", []);
app.controller("GetCtrl", function ($scope, $http) {
	var ls_dezenas = function () {
		$http.get("php/busca_dez.php").success(function(data){
			$scope.dezenas = data;
		});
	}
	ls_dezenas();
});
