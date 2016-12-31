var app = angular.module("shops", []);


app.controller('shops-ctrl',['$scope', '$http', function($scope,$http) {
  $scope.loaded=false;
  $scope.loadMap = function(locations){
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 5,
      center: locations[0]
    });

    var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

    var markers = locations.map(function(location, i) {
      return new google.maps.Marker({
        position: location,
        label: labels[i % labels.length]
      });
    });

    var markerCluster = new MarkerClusterer(map, markers,
        {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
  }
  $http.get('ajax/get_shops.php',{params:{'action':'get_shops_source_1'}})
    .then(function(response, status, header, config){

            //Parse json objecct
            var result = response.data.GetAllStoresResult;
            angular.forEach(result, function(value, key) {
              if("StoreList"==key) $scope.storeList=value;
            });


            //Load map by loading locations
            var locations=[];
            var itr=null;
            for(var i=0;i<$scope.storeList.length;i++){
              itr = $scope.storeList[i];
              locations.push({lat:itr.Lat,lng:itr.Long});
            }
            $scope.loadMap(locations);

            //Enable map div
            $scope.loaded=true;

    });
}]);
