
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

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular.min.js"></script>
    <script src="js/shops.js"></script>
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
    </style>
  </head>

  <body ng-app="shops" ng-controller="shops-ctrl">

    <div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="#">List</a></li>
            <li role="presentation"><a href="map-view.php">View Map</a></li>
          </ul>
        </nav>
        <h3 class="text-muted">Shop Finder</h3>
      </div>
      <div class="loader" ng-show="!loaded">
        <img  src="img/loader.gif"><br>
        Please wait...
      </div>
      <div class="col-lg-6" ng-show="loaded" style="padding-left:0;">
        <div class="input-group">
          <input class="form-control" ng-model="searchText" placeholder="Search for...">
          <span class="input-group-btn"> <button class="btn btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
      <br>

      <div class="row marketing">

          <div ng-repeat="store in storeList | filter:searchText" class="stores">

          <h4>{{store.name}}</h4>
          <p>{{store.StreetAddress}},<br>{{store.City}},<br> {{store.PostalCode}}</p>
         </div>



      

      <footer class="footer">
        <p>&copy; 2017 Happy New Year!!</p>
      </footer>

    </div> <!-- /container -->

  </body>
</html>
