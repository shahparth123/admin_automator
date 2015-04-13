var app = angular.module('admin_automator', ['ui.bootstrap']);
var count = 1;
app.filter('startFrom', function() {
	return function(input, start) {
		if(input) {
            start = +start; //parse to int
            return input.slice(start);
        }
        return [];
    }
});


app.directive("addbuttonsbutton", function(){
	return {
		restrict: "E",
		template: "<button addbuttons class=\"btn btn-primary\">Click to add parameters</button>"
	}
});

//Directive for adding buttons on click that show an alert on click
app.directive("addbuttons", function($compile){
	return function(scope, element, attrs){
		element.bind("click", function(){
			count++;
			angular.element(document.getElementById('frm')).append($compile("<div class=\"col-md-4\">Parameter "+count+":<input type=\"text\" ng-model=\"para.p"+count+"\" ng-init=\"para.p"+count+"=''\" ng-change=\"filter()\" placeholder=\"p"+count+"\" class=\"form-control\" /></div>")(scope));
		});
	};
});

//Directive for showing an alert on click
app.directive("alert", function(){
	return function(scope, element, attrs){
		element.bind("click", function(){
			console.log(attrs);
			alert("This is alert #"+attrs.alert);
		});
	};
});


app.controller('customersCrtl', function ($scope, $http, $timeout) {
	
	$scope.setPage = function(pageNo) {
		$scope.currentPage = pageNo;
	};

	$scope.ad =function(){
		var myEl = angular.element( document.querySelector( '#frm' ) );
		z++;
		myEl.append($compile('<div class="col-md-4">Param:<input type="text" ng-model="para.p'+z+'" ng-change="filter()" placeholder="Para" class="form-control" />'+'</div>'));   
	}
	$scope.filter = function() {

		$http({
			method: "POST",
			url: $scope.url,
			data: $.param($scope.para),
			headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).
		success(function(response) {
			$scope.list = response;
        $scope.currentPage = 1; //current page
        $scope.entryLimit = 5; //max no of items to display in a page
        $scope.filteredItems = $scope.list.length; //Initially for no filter  
        $scope.totalItems = $scope.list.length;
        console.log($scope.para);
    }).
		error(function(response) {
			$scope.codeStatus = response || "Request failed";
		});

		$timeout(function() { 
			$scope.filteredItems = $scope.filtered.length;
		}, 10);
	};
	$scope.sort_by = function(predicate) {
		$scope.predicate = predicate;
		$scope.reverse = !$scope.reverse;
	};
});