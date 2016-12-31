var app = angular.module("shops", []);


app.controller('shops-ctrl',['$scope', '$http', function($scope,$http) {
  $scope.loaded=false;
  $http.get('ajax/get_shops.php',{params:{'action':'get_shops_source_1'}})
    .then(function(response, status, header, config){
            var result = response.data.GetAllStoresResult;
            angular.forEach(result, function(value, key) {
              if("StoreList"==key) $scope.storeList=value;
            });
            $scope.loaded=true;
    });
}]);
