var app = angular.module("shops", []);


app.controller('shops-ctrl',['$scope', '$http', function($scope,$http) {
  $scope.loaded=false;
  $scope.current_source="Source 1";
  $scope.storeAddress=[];
  $scope.storeName=[];
  $http.get('ajax/get_shops.php',{params:{'action':'get_shops_nearby','lat':$("#lat").val(),'lon':$("#lon").val()}})
    .then(function(response, status, header, config){
            var result = response.data.GpsSearchResult;
            $scope.storeList=result;

            $scope.loaded=true;
    });

}]);
