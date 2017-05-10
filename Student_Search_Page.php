<?php
	session_start();

    if(isset($_SESSION['authorized']) && $_SESSION['authorized'] === TRUE){
        //echo "authorized to enter this page!";
       // session_unset($_SESSION['authorized']);
    } else {
        //echo "not authorized to enter this page";
        session_unset($_SESSION['authorized']);
        header('Location: login_page_with_session.php');
    }
?>

<!DOCTYPE html>
<html ng-app="fetch">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.24/angular.min.js"></script>
</head>

<style>
form {
    border: 3px solid #f1f1f1;
}

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

.container {
    padding: 16px;
}

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #f1f1f1;
}

li {
    float: left;
}

li a, .dropbtn {
    display: inline-block;
    color: black;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

</style>
<body style="background-color:#F0EEEE;">
	
	<div class="imgcontainer">
		<img src="http://blogs.egusd.net/prairie/files/2013/07/priaire-header-1r736jq.jpg" alt="priarie logo">
	</div>

	<br>
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-sm-1">
					<a href="Faculty_Profile_Page_with_session.php">Home</a>
				</div>
				<div class="col-sm-10"></div>
				<div class="col-sm-1">
					<a href id="logoff">Logoff</a>
				</div>
			</div>	

				<h1>Search for Student</h1>
				<div ng-controller="dbCtrl">
					<input type="text" ng-model="searchFilter" class="form-control">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Name</th>
									<th>Student ID</th>
								</tr>
							</thead>
							<tbody>
								<tr ng-repeat="students in data | filter:searchFilter">
									<td><a ng-href="Student_Profile_Page_with_session.php?fname={{students.fname}}&lname={{students.lname}}&idnum={{students.sid}}">{{students.fname}} {{students.lname}}</a></td>
									<td>{{students.sid}}</td>
								</tr>
							</tbody>
						</table>
				</div>
			</div>
		</div>
	</div>
</body>

	<script>
        var fetch = angular.module('fetch', []);

        fetch.controller('dbCtrl', ['$scope', '$http', function ($scope, $http) {
            $http.get("get_students.php")
                .success(function(data){
                    $scope.data = data;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });
        }]);

    </script>

	<!--script for logoff operation -->
	<script type="text/javascript">

		$('#logoff').click(function(){
			$.ajax({
				type: 'POST',
				url: 'logoff.php',
				data: '',
				success: function(response){
							var trim = $.trim(response);
							if(trim == 'ok'){
								//window.alert(response);
								window.location.href = "login_page_with_session.php";
							} else {
								//console.log(response);
								console.log("unable to logout!");
							}
						},
				error: function(a,b,c){
						console.log(a);
						console.log(b);
						console.log(c);
					}
			});
		});
	</script>

</html>

