<!DOCTYPE html >
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>asdf</title>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.0/angular.min.js"></script>
  <script type="text/javascript">
   function userController($scope,$http) {
     $scope.users = [];
     $http.get('<?php echo site_url('angularjs/get_list'); ?>').success(function($data){ $scope.users=$data; });
   }
  </script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
</head>
<body ng-app>
  <div class="container">
    <div class="col-lg-12 col-md-12">
      <table ng-controller="userController" class="table table-bordered table-condensed table-responsive">
        <thead>
          <tr>
            <td>S.no.</td>
            <td>Email</td>
          </tr>
        </thead>
        <tbody>
          <tr ng-repeat="user in users">
            <td>{{user.usu_id}}</td>
            <td>{{user.usu_usuario}}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

</body>
</html>
