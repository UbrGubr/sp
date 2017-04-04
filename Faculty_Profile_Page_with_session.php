<?php

    //start session
    session_start();

    echo $_SESSION['authorized'];

    //verify user authenticity
    if(isset($_SESSION['authorized']) && $_SESSION['authorized'] === TRUE){
        //echo "authorized to enter this page!";
        //session_unset($_SESSION['authorized']);
    } else {
        echo "not authorized to enter this page";
        //session_unset($_SESSION['authorized']);
        header('Location: login_page_with_session.php');
    }
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
    color: Black;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
    background-color: #e0e0e0;
}

li.dropdown {
    display: inline-block;
}
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.show {display:block;}

</style>

<body style="background-color:#F0EEEE;">

	<div class="imgcontainer">
		<img src="http://blogs.egusd.net/prairie/files/2013/07/priaire-header-1r736jq.jpg" alt="priarie logo">
	</div>
	<div class="container-fluid">
		<div class="container">
			
			<h3>Teacher Profile</h3>
			
			<ul class="nav nav-tabs">
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">Student <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="Student_Registration_Page.html">Add</a></li>
							<li><a href="#">Modify</a></li>        
						</ul>
				</li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">Teacher <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="Faculty_Registration_Page.html">Add</a></li>
							<li><a href="#">Modify</a></li>          
						</ul>
				</li>
				<li><a href="Calendar.html">Calendar</a></li>
				<li class="dropdown">
            		<a href="#" class="dropbtn" id="logoff">Log Off</a>
        		</li>
			</ul>
			<form action="action_page.php">
				<div class="container">
					<label><b>Search for student</b></label>
					<input type="text" placeholder="Search">
					
					<label><b>Search by: </b></label>
							<select id="search" name="search">
								<option value=""> </option>
								<option value="firstname">First Name</option>
								<option value="lastname">Last Name</option>
								<option value="idnumber">ID Number</option>
								<option value="gradelevel">Grade Level</option>
								<option value="readinglevel">Reading Level</option>
								<option value="mathlevel">Math Level</option>
								<option value="track">Track</option>

							</select>
					
					<button type="button" class="btn btn-default">
						<span class="glyphicon glyphicon-search"></span> Search
					</button>
				
					<div class="row">
						<div class="col-sm-3">
							<div class="imgcontainer">
								<img src="https://rlv.zcache.com/little_girl_silhouette_5_x_7_photo_print-rb397f23ed99f480da092c7450a3a342e_fk95_8byvr_324.jpg" alt="Girl">
									<ul class="list-group">
										<strong>User name</strong><br>
										<strong>Change Avatar</strong>
									</ul> 
							</div>
						</div>

						<div class="col-sm-1">
							<br><br><br>
							<ul style="list-style-type:disc">
								<li><strong>Tracks:</strong></li>
								<br><br><br>
								<li><strong>Number of Students:</strong></li>
							</ul>
							<br><br><br> 			  
						</div>
						
						<h1 style="text-align:center">Alerts</h1>
						
						<div class="col-sm-8">
							<div class="table-responsive">
								<div class="container">
									<div class="alert alert-success">
										<strong>Success!</strong> The student has taken all required assessments!
									</div>
									<div class="alert alert-info">
										<strong>Info!</strong> Updated the students info!
									</div>
									<div class="alert alert-warning">
										<strong>Warning!</strong> Assessments approaching within 2 weeks!
									</div>
									<div class="alert alert-danger">
										<strong>Danger!</strong> Assessments within 2 days!
									</div>
								</div>
							</div>
						</div>
					</div>
	
					<h2 style="text-align:center">Dates and Notes</h2>
					<div class="col-sm-12">
						<ul class="nav nav-tabs" id="myTab">
							<li class="active"><a href="#home" data-toggle="tab">Dates</a></li>
							<li><a href="#notes" data-toggle="tab">Notes</a></li>
						</ul>
						  
						<div class="tab-content">
							<div class="tab-pane active" id="home">
								<div class="table-responsive">
									<table class="table table-hover">
										<ul class="list-group">
										  <li class="list-group-item text-right"><a class="pull-left">Here is your a link to the latest summary report from the..</a> 2.13.2014</li>
										  <li class="list-group-item text-right"><a class="pull-left">Hi Joe, There has been a request on your account since that was..</a> 2.11.2014</li>
										  <li class="list-group-item text-right"><a class="pull-left">Nullam sapien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
										  <li class="list-group-item text-right"><a class="pull-left">Thllam sapien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
										  <li class="list-group-item text-right"><a class="pull-left">Wesm sapien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
										  <li class="list-group-item text-right"><a class="pull-left">For therepien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
										  <li class="list-group-item text-right"><a class="pull-left">Also we, havesapien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
										  <li class="list-group-item text-right"><a class="pull-left">Swedish chef is assaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
										</ul>
									</table>
								</div>
							</div>
							
							<div class="tab-pane" id="notes">
								<textarea rows="20" cols="80">
									Enter notes here. 
								</textarea>
							</div>							  
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>


	<!--log off script -->
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

</body>
</html>
