<?php
	
	//create a new session
	session_start();
	//session_unset($_SESSION['authorized']);
	//$_SESSION['username'] = 'testing123';
	//print all php session variables
	//echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 750px;
    border: none;
    cursor: pointer;
    width: 15%;
}

.imgcontainer {
    text-align: center;
    margin: 13px 16px 5px 0;
}

.container {
    padding: 16px;
}

.errorMessage {
	color: rgb(255,0,0);
	font-size: 50%;
}

.hidden {
	display: none;
}

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a, .dropbtn {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
    background-color: red;
}

</style>

<body style="background-color:#F0EEEE;">

	<form id = "id" action="login_page.html" title method = "post">
	
		<div class="imgcontainer">
			<img src="http://blogs.egusd.net/prairie/files/2013/07/priaire-header-1r736jq.jpg" alt="priarie logo" class="avatar">
		</div>
	
		<div class="container-fluid">
			<div class="container">

				<ul class="nav nav-tabs">
					<li class="dropdown">
						<a href="Forgot_Password_Page.html">Forgot Password</a>
					</li>
					<li class="dropdown">
						<a href="Faculty_Registration_Page.html">Register</a>
					</li>
				</ul>

				<div class="container">
					<label><b>Email</b></label>
					<div id="error" class="hidden errorMessage">Incorrect username or password</div>
					<input type="text" placeholder="Enter email" name="email" id="email">
					<br>
					<label><b>Password</b></label>
					<input type="password" placeholder="Enter Password" name="psw" id="password">
					
					<!--LOGIN BUTTON-->
					<button type="button" id="test">Login</button>
			<!--		<a href="Faculty_Registration_Page.html" class="dropbtn">Register New Teacher</a> -->
				</div>
			</div>
		</div>
	</form>
</body>

<!--this function corresponds to button click to login-->
<script type="text/javascript">
	$('#test').click(function(){
		var email = $('#email').val();
		var pw = $('#password').val();
		$.ajax({
			type: 'POST',
			url: 'login.php',
			data: { email: email, pw: pw },
			//on successful return response trim string and test for validity
			success: function(response) { 
				var trimmedResult = $.trim(response);
				if(trimmedResult == "ok"){
					$('#result').html(trimmedResult);
					
					//start php session here
					$.ajax({
						type: 'POST',
						url: 'php_session_script.php',
						data: '',
						success: function(response){
							var trim = $.trim(response);
							if(trim != 'error'){
								window.alert(response);
								window.location.href = "Faculty_Profile_Page_with_session.php";
							} else {
								window.alert(reponse);
							}
						},
						error: function(a,b,c){
							console.log(a);
							console.log(b);
							console.log(c);
						}
					});

				} else {
					//window.alert(trimmedResult);
					$('#error').show();
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

<!--this function corresponds to the enter key to login-->
<script type="text/javascript">
	$('#id').keydown(function(event){
		if(event.keyCode==13){
			$('#test').trigger('click');
		}
	});
</script>

<!--this button corresponds to the click me button; inserts data to database-->
<!--
<script type="text/javascript">
	
		$(document).ready(function(){
			$("#clickMe").click(function(){
			console.log('clicked');
			$.ajax({
				type: "POST",
				url: "test_php_script.php",
				data: " ",
				success: function() {
					console.log('successful request made');},
				error: function() {
					console.log('errr');}
			})
			});
		});
</script>-->

<!--corresponds to the Login link; inserts data into the database-->
<!--
<script type="text/javascript">
	$(document).ready(function(){
		$("#test").click(function(){
			var userName = $('#email').val();
			var pw = $('#password').val();
			$.ajax({
				type: "POST",
				url: "insert.php",
				data: { un: userName, pw: pw},
				success: function(returnData){
					console.log('successfully sent data to php');
				//	$('result').html(returnData);
					},
				error: function(a,b,c){
					console.log(a);
					console.log(b);
					console.log(c);
				}
			})
		});
	});
-->
</script>

</html>
