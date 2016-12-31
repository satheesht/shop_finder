
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
    <script src="js/shops-nearby.js"></script>

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
      .services{
        background-color: #f1ecec;
border-radius: 5px;
padding: 7px;
font-size: 13px;
list-style-type: none;
      }
    </style>
  </head>

  <body ng-app="shops" ng-controller="shops-ctrl">
    <input type="hidden" id='lat' value="<?php echo $_GET['lat'];?>">
    <input type="hidden" id='lon' value="<?php echo $_GET['lon'];?>">
    <div class="container">
      <div class="header clearfix">

        <h3 class="text-muted"><a href='index.php'>Shop Finder</a> &gt; <?php echo $_GET['name']?> &gt; Nearby Shops</h3>

      </div>

      <div class="jumbotron">
        <h1 style="font-size:40px;"><?php echo $_GET['name']?></h1>
        <p class="lead"><?php echo $_GET['address']?><br><?php echo $_GET['city']?><br><?php echo $_GET['zip']?></p>
      </div>

      <h2 style="color:green;">Shops found withing 10KMs </h2>

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

      <div class="row marketing">

          <div ng-repeat="store in storeList | filter:searchText" class="stores">

          <h4>{{store.StoreName}}</h4>
          <p>{{store.Address}},<br>{{store.Phone}},<br> {{store.PostalCode}}</p>
          <ul class="services">
            <li >{{store.Services.join(', ')}}</li>
          </ul>
          <a href="{{store.WeeklyOffersLink}}">Click here to view offers of the week!</a>

         </div>

      <footer class="footer">
        <p>&copy; 2017 Happy New Year!!</p>
      </footer>

    </div> <!-- /container -->

  </body>
</html>
