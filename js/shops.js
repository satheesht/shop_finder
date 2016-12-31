var app = angular.module("shops", []);


app.controller('shops-ctrl',['$scope', '$http', function($scope,$http) {
  $scope.loaded=false;
  $scope.current_source="Source 1";
  $http.get('ajax/get_shops.php',{params:{'action':'get_shops_source_1'}})
    .then(function(response, status, header, config){
            var result = response.data.GetAllStoresResult;
            angular.forEach(result, function(value, key) {
              if("StoreList"==key) $scope.storeList=value;
            });
            $scope.loaded=true;
    });
    $scope.changeSource = function(source,name){
      $scope.current_source=name;
      $scope.loaded=false;
      $http.get('ajax/get_shops.php',{params:{'action':'get_shops_'+source}})
        .then(function(response, status, header, config){
                var result = response.data.GetAllStoresResult;
                angular.forEach(result, function(value, key) {
                  if("StoreList"==key) $scope.storeList=value;
                });
                $scope.loaded=true;
        });
    }
}]);
