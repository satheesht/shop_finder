
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Geo Search</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">


    <link href="css/custom.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular.min.js"></script>
    <script src="js/shops_maps.js"></script>
    <style>
      .stores{
          border: 1px solid #e6e6e6;
          padding: 0px 10px 0px 10px;
          border-radius: 7px;
          margin-bottom:5px;
      }
      .loader{
          width:100%;
          text-align:center;
      }
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map_canvas,#map{
        width:100%;
        height:500px;
      }
    </style>
  </head>

  <body ng-app="shops" ng-init="cr_src=<?php echo $_GET['src'];?>" ngClock ng-controller="shops-ctrl" style="padding-top:20px;">
    <input type="hidden" id='source_init' value="<?php echo $_GET['src'];?>">
    <div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" ><a href="index.php">List</a></li>
            <li role="presentation" class="active"><a href="#">Map</a></li>
          </ul>
        </nav>
        <h3 class="text-muted">Shop Finder</h3>
        <div class="btn-group">
          <button type="button" class="btn btn-danger">Address Source {{cr_src}}</button>
          <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span>
          </button>
          <ul class="dropdown-menu">
            <li><a href="map-view.php?src=1">Source 1</a></li>
            <li><a href="map-view.php?src=2">Source 2</a></li>
          </ul>
        </div>
      </div>
      <div class="loader" ng-show="!loaded">
        <img  src="img/loader.gif"><br>
        Please wait...
      </div>


      <div id="map" ng-show="loaded"></div>
          <script>

            function initMap() {}

          </script>
          <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
          </script>
          <script async defer
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZFZQms-3roFcz792Gc2-HjmF4LEmPTrw&callback=initMap">
          </script>

      <footer class="footer">
        <p>&copy; 2017 Happy New Year!!</p>
      </footer>

    </div> <!-- /container -->

  </body>
</html>
