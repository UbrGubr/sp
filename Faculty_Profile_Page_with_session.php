<?php

    //start session
    session_start();

    //echo $_SESSION['authorized'];

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
}

li a:hover, .dropdown:hover .dropbtn {
    background-color: #e0e0e0;
}

</style>

<body style="background-color:#F0EEEE;">

	<div class="imgcontainer">
		<img src="http://blogs.egusd.net/prairie/files/2013/07/priaire-header-1r736jq.jpg" alt="priarie logo">
	</div>
	
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<h3>Teacher Profile</h3>
				<ul class="list-inline">
					<li><a href="Student_Registration_Page.html">Add Student</a></li>
					<li><a href="#">Modify Student</a></li>
					<li><a href="Calendar.html">Calendar</a></li>
					<li><a href="#">Modify Teacher</a></li>
					<button class="btn btn-default pull-right" type="button" id="logoff">Logoff</button>
				</ul>
			</div>
		</div>
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
						<h2>Teacher Name</h2>
						<strong>Tracks:</strong><br>						
						<strong>Number of Students:</strong>
					
					</div>
					  
					<div class="row">
						<div class="col-sm-6">
							<h2>Alerts</h2>
							<div class="table-responsive">
								<ul class="nav nav-tabs" id="myTab">
									<li><a href="#success" data-toggle="tab">Success</a></li>
									<li><a href="#info" data-toggle="tab">Info</a></li>
									<li><a href="#warning" data-toggle="tab">Warning</a></li>
									<li><a href="#danger" data-toggle="tab">Danger</a></li>
								</ul>
							</div>
							<div class="tab-content">
								<div class="tab-pane" id="success">
									<div class="table-responsive">
										<div class="alert alert-success">
											The student has taken all required assessments!
										</div>
									</div>
								</div>
								<div class="tab-pane" id="info">
									<div class="table-responsive">
										<div class="alert alert-info">
											Updated the students info!
										</div>
									</div>
								</div>
								<div class="tab-pane" id="warning">
									<div class="table-responsive">
										<div class="alert alert-warning">
											Assessments approaching within 2 weeks!
										</div>
									</div>
								</div>		
								<div class="tab-pane" id="danger">
									<div class="table-responsive">
										<div class="alert alert-danger">
											Assessments within 2 days!
										</div>
									</div>
								</div>							
							</div>
						</div>
					
						<div class="col-sm-6">
							<h2>Dates and Notes</h2>
							<ul class="nav nav-tabs" id="myTab">
								<li><a href="#home" data-toggle="tab">Dates</a></li>
								<li><a href="#notes" data-toggle="tab">Notes</a></li>
							</ul>
							  
							<div class="tab-content">
								<div class="tab-pane active" id="home">
									<div class="table-responsive">
										<table class="table table-hover">
											<ul class="list-group">
											  <li class="list-group-item text-right"><a href="#">Here is your a link to the latest summary report from the..</a> 2.13.2014</li>
											  <li class="list-group-item text-right"><a href="#">Hi Joe, There has been a request on your account since that was..</a> 2.11.2014</li>
											  <li class="list-group-item text-right"><a href="#">Nullam sapien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
											  <li class="list-group-item text-right"><a href="#">Thllam sapien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
											  <li class="list-group-item text-right"><a href="#">Wesm sapien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
											  <li class="list-group-item text-right"><a href="#">For therepien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
											  <li class="list-group-item text-right"><a href="#">Also we, havesapien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
											  <li class="list-group-item text-right"><a href="#">Swedish chef is assaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
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
				</div>
			</form>
		</div>
	</div>
</body>

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
	
</html>
