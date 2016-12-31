var app = angular.module("shops", []);


app.controller('shops-ctrl',['$scope', '$http', function($scope,$http) {
  $scope.loaded=false;
  $scope.map=null;
  $scope.locations=[];
  $scope.cr_src=$("#source_init").val();

  if('undefined'==$scope.cr_src || ''==$scope.cr_src) $scope.cr_src=1;


  $scope.loadMap = function(){
    $scope.map = new google.maps.Map(document.getElementById('map'), {
      zoom: 5,
      center: $scope.locations[0]
    });

    var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

    var markers = $scope.locations.map(function(location, i) {
      return new google.maps.Marker({
        position: location,
        label: labels[i % labels.length]
      });
    });

    var markerCluster = new MarkerClusterer($scope.map, markers,
        {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});

        google.maps.event.trigger($scope.map, 'resize');
  }

  $http.get('ajax/get_shops.php',{params:{'action':'get_shops_source_'+$scope.cr_src}})
    .then(function(response, status, header, config){

            //Parse json objecct
            var result = response.data.GetAllStoresResult;
            angular.forEach(result, function(value, key) {
              if("StoreList"==key) $scope.storeList=value;
            });


            //Load map by loading locations
            $scope.locations=[];
            var itr=null;
            for(var i=0;i<$scope.storeList.length;i++){
              itr = $scope.storeList[i];
              $scope.locations.push({lat:itr.Lat,lng:itr.Long});
            }
            $scope.loadMap();

            //Enable map div
            $scope.loaded=true;

    });
}]);
