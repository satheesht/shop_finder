
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
    <script src="js/shops.js"></script>

    <style>
      .stores{
          border: 1px solid #e6e6e6;
          padding: 0px 10px 0px 10px;
          border-radius: 7px;
          margin-bottom:5px;
          position:relative;
      }
      .loader{
          width:100%;
          text-align:center;
      }
      .search-nearby-btn{
          position: absolute;
          right: 0px;
          top: 0;
      }
    </style>
  </head>

  <body ng-app="shops" ng-controller="shops-ctrl">

    <div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="#">List</a></li>
            <li role="presentation"><a href="map-view.php">Map</a></li>
            <li role="presentation">

            </li>
          </ul>

        </nav>
        <h3 class="text-muted">Shop Finder</h3>
        <div class="btn-group">
          <button type="button" class="btn btn-danger">Address {{current_source}}</button>
          <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span>
          </button>
          <ul class="dropdown-menu">
            <li ng-click="changeSource('source_1','Source 1')"><a href="#">Source 1</a></li>
            <li ng-click="changeSource('source_2','Source 2')"><a href="#">Source 2</a></li>

            
          </ul>
        </div>
      </div>
      <div class="loader" ng-show="!loaded">
        <img  src="img/loader.gif"><br>
        Please wait...
      </div>

      <div class="col-lg-6" ng-show="loaded" style="padding-left:0;">
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Search Shops</span>
            <input type="text" class="form-control" ng-model="searchText" id="basic-url" aria-describedby="basic-addon3">
        </div>

      </div>
      <Br>

      <div class="row marketing">

          <div ng-repeat="store in storeList | filter:searchText" class="stores">

          <h4>{{store.Name}}</h4>
          <p>{{store.StreetAddress}},<br>{{store.City}},<br> {{store.PostalCode}}</p>
          <div class="btn-group search-nearby-btn">
            <a href="search-shops.php?lat={{store.Lat}}&lon={{store.Long}}&name={{store.Name}}&address={{store.StreetAddress}}&city={{store.City}}&zip={{store.PostalCode}}"><button type="button" class="btn btn-default">Search Nearby Shops <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></button>
          </div>
         </div>





      <footer class="footer">
        <p>&copy; 2017 Happy New Year!!</p>
      </footer>

    </div> <!-- /container -->

  </body>
</html>
