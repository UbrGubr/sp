
<?php

    session_start();
    //check session id
    //echo session_id();

    //check session domain
    echo ini_get('session.cookie_domain');

    //print all php session variables
    echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
/*
    if(isset($_SESSION['authorized']) && $_SESSION['authorized'] === TRUE){
        echo "authorized to enter this page!";
        session_unset($_SESSION['authorized']);
    } else {
        echo "not authorized to enter this page";
        session_unset($_SESSION['authorized']);
        header('Location: login_page_with_session.php');
    }
*/
?>
<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
=======

<!DOCTYPE html>
<html>
>>>>>>> c51cd2bf50de637ca2616749b70963cd1478f7b9
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
<<<<<<< HEAD
    margin: 8px 450px;
=======
    margin: 8px 700px;
>>>>>>> c51cd2bf50de637ca2616749b70963cd1478f7b9
    border: none;
    cursor: pointer;
    width: 10%;
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
<<<<<<< HEAD
    background-color: #f1f1f1;
=======
    background-color: #333;
>>>>>>> c51cd2bf50de637ca2616749b70963cd1478f7b9
}

li {
    float: left;
}

li a, .dropbtn {
    display: inline-block;
<<<<<<< HEAD
    color: black;
=======
    color: white;
>>>>>>> c51cd2bf50de637ca2616749b70963cd1478f7b9
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
<<<<<<< HEAD
    background-color: #e0e0e0;
}





.dropdown-content a:hover {background-color: #f1f1f1}

</style>
<body style="background-color:#F0EEEE;">
=======
    background-color: red;
}

li.dropdown {
    display: inline-block;
}
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
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
<body>
>>>>>>> c51cd2bf50de637ca2616749b70963cd1478f7b9
	
	<div class="imgcontainer">
		<img src="http://blogs.egusd.net/prairie/files/2013/07/priaire-header-1r736jq.jpg" alt="priarie logo">
	</div>
<<<<<<< HEAD
	
	<div class="container-fluid">	 
		<div class="container">
			
			<h3>Register New Student</h3>
		
			<ul class="list-inline">
				<li><a href="Faculty_Profile_Page.html">Home</a></li>
			</ul>

			<form action="action_page.php">
				<div class="container">
					<label><b>First Name</b></label>
					<input type="text" placeholder="Enter first name" required>
					
					<label><b>Middle Name</b></label>
					<input type="text" placeholder="Enter middle name" required>
					
					<label><b>Last Name</b></label>
					<input type="text" placeholder="Enter last name" required>

					<label><b>ID Number</b></label>
					<input type="text" placeholder="Enter ID number" required>
					
					<div class="row">
						<div class="col-sm-3">
							<label><b>Gender<b></label><br>
							<select id="gender" name="gender">
								<option value="">M/F</option>
								<option value="male">Male</option>
								<option value="female">Female</option>
							</select>
						</div>
						<div class="col-sm-3">
							<label><b>Grade Level<b></label><br>
							<select name="gradelevel">
								<option value="grade">Grade</option>
								<option value="k">Kindergarten</option>
								<option value="1">1st grade</option>
								<option value="2">2nd grade</option>
								<option value="3">3rd grade</option>
								<option value="4">4th grade</option>
								<option value="5">5th grade</option>
								<option value="6">6th grade</option>
							</select>
						</div>
						<div class="col-sm-3">
							<label><b>Reading Level<b></label><br>
							<select name="readinglevel">
								<option value="grade">Grade</option>
								<option value="k">Kindergarten</option>
								<option value="1">1st grade</option>
								<option value="2">2nd grade</option>
								<option value="3">3rd grade</option>
								<option value="4">4th grade</option>
								<option value="5">5th grade</option>
								<option value="6">6th grade</option>
							</select>
						</div>
						<div class="col-sm-3">
							<label><b>Math Level<b></label><br>
							<select name="mathlevel">
								<option value="grade">Grade</option>
								<option value="k">Kindergarten</option>
								<option value="1">1st grade</option>
								<option value="2">2nd grade</option>
								<option value="3">3rd grade</option>
								<option value="4">4th grade</option>
								<option value="5">5th grade</option>
								<option value="6">6th grade</option>
							</select>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm-1">
							<label><b>Behavioral<b></label><br>
							<select id="behavioral" name="behavioral">
								<option value="">Y/N</option>
								<option value="yes">Yes</option>
								<option value="no">No</option>
							</select><br><br>
						</div>
						<div class="col-sm-1">
							<label><b>Emotional<b></label><br>
							<select id="emotional" name="emotional">
								<option value="">Y/N</option>
								<option value="yes">Yes</option>
								<option value="no">No</option>
							</select><br><br>	
						</div>
						<div class="col-sm-1">
							<label><b>Cognitive<b></label><br>
							<select id="cognitive" name="cognitive">
								<option value="">Y/N</option>
								<option value="yes">Yes</option>
								<option value="no">No</option>
							</select><br><br>
						</div>
						<div class="col-sm-1">
							<label><b>Speech/Language<b></label><br>
							<select id="speech/language" name="speech/language">
								<option value="">Y/N</option>
								<option value="yes">Yes</option>
								<option value="no">No</option>
							</select><br><br>
						</div>
					</div>
					
					<label><b>Date of Birth<b></label><br>
					<select name="months">
						<option value="">Month</option>
						<option value="Jan">January</option>
						<option value="Feb">February</option>
						<option value="Mar">March</option>
						<option value="Apr">April</option>
						<option value="May">May</option>
						<option value="Jun">June</option>
						<option value="Jul">July</option>
						<option value="Aug">August</option>
						<option value="Sept">September</option>
						<option value="Oct">October</option>
						<option value="Nov">November</option>
						<option value="Dec">December</option>
					</select>
				  
					<select name="days">
						<option>Day</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
						<option value="13">13</option>
						<option value="14">14</option>
						<option value="15">15</option>
						<option value="16">16</option>
						<option value="17">17</option>
						<option value="18">18</option>
						<option value="19">19</option>
						<option value="20">20</option>
						<option value="21">21</option>
						<option value="22">22</option>
						<option value="23">23</option>
						<option value="24">24</option>
						<option value="25">25</option>
						<option value="26">26</option>
						<option value="27">27</option>
						<option value="28">28</option>
						<option value="29">29</option>
						<option value="30">30</option>
						<option value="31">31</option>
					</select>

					<select name="year">
						<option>Year</option>
						<option value="2011">2018</option>
						<option value="2004">2017</option>
						<option value="2016">2016</option>
						<option value="2015">2015</option>
						<option value="2014">2014</option>
						<option value="2013">2013</option>
						<option value="2012">2012</option>
						<option value="2011">2011</option>
						<option value="2010">2010</option>
						<option value="2009">2009</option>
						<option value="2008">2008</option>
						<option value="2007">2007</option>
						<option value="2006">2006</option>
						<option value="2005">2005</option>
						<option value="2004">2004</option>
						<option value="2003">2003</option>
						<option value="2002">2002</option>
					</select><br>

					<br><label><b>Track<b></label><br>
					<select id="track" name="track">
						<option value=""></option>
						<option value="A">A</option>
						<option value="B">B</option>
						<option value="C">C</option>
						<option value="D">D</option>
					</select>
			  	  <button type="submit" value="Submit">Submit</button>
				</div>
			</form>
		</div>
	</div>
</body>


=======

	<form action="action_page.php">
	<ul>
		<li class="dropdown">
			<a href="javascript:void(0)" class="dropbtn" onclick="myFunction()">Home</a>
			<div class="dropdown-content" id="myDropdown">
				<a href="Faculty Profile Page.html">Back To Home</a>
			</div>
		</li>
	</ul>
	
<h2>Register New Student</h2>

<form action="action_page.php">
	<div class="container">
		<label><b>First Name</b></label>
		<input type="text" placeholder="Enter first name" required>
		
		<label><b>Middle Name</b></label>
		<input type="text" placeholder="Enter middle name" required>
		
		<label><b>Last Name</b></label>
		<input type="text" placeholder="Enter last name" required>

		<label><b>ID Number</b></label>
		<input type="text" placeholder="Enter ID number" required>
		
		<br><label><b>Gender<b></label><br>
		<select id="gender" name="gender">
			<option value="">M/F</option>
			<option value="male">Male</option>
			<option value="female">Female</option>
		</select><br><br>
  
		<label><b>Grade Level<b></label><br>
		<select name="gradelevel">
			<option value="grade">Grade</option>
			<option value="k">Kindergarten</option>
			<option value="1">1st grade</option>
			<option value="2">2nd grade</option>
			<option value="3">3rd grade</option>
			<option value="4">4th grade</option>
			<option value="5">5th grade</option>
			<option value="6">6th grade</option>
		</select><br><br>
		
		<label><b>Reading Level<b></label><br>
		<select name="readinglevel">
			<option value="grade">Grade</option>
			<option value="k">Kindergarten</option>
			<option value="1">1st grade</option>
			<option value="2">2nd grade</option>
			<option value="3">3rd grade</option>
			<option value="4">4th grade</option>
			<option value="5">5th grade</option>
			<option value="6">6th grade</option>
		</select><br><br>
		
		<label><b>Math Level<b></label><br>
		<select name="mathlevel">
			<option value="grade">Grade</option>
			<option value="k">Kindergarten</option>
			<option value="1">1st grade</option>
			<option value="2">2nd grade</option>
			<option value="3">3rd grade</option>
			<option value="4">4th grade</option>
			<option value="5">5th grade</option>
			<option value="6">6th grade</option>
		</select><br><br>
		
		<br><label><b>Behavioral<b></label><br>
		<select id="behavioral" name="behavioral">
			<option value="">Y/N</option>
			<option value="yes">Yes</option>
			<option value="no">No</option>
		</select><br><br>

		<br><label><b>Emotional<b></label><br>
		<select id="emotional" name="emotional">
			<option value="">Y/N</option>
			<option value="yes">Yes</option>
			<option value="no">No</option>
		</select><br><br>	
		
		<br><label><b>Cognitive<b></label><br>
		<select id="cognitive" name="cognitive">
			<option value="">Y/N</option>
			<option value="yes">Yes</option>
			<option value="no">No</option>
		</select><br><br>
		
		<br><label><b>Speech/Language<b></label><br>
		<select id="speech/language" name="speech/language">
			<option value="">Y/N</option>
			<option value="yes">Yes</option>
			<option value="no">No</option>
		</select><br><br>
			
		<label><b>Date of Birth<b></label><br>
		<select name="months">
			<option value="">Month</option>
			<option value="Jan">January</option>
			<option value="Feb">February</option>
			<option value="Mar">March</option>
			<option value="Apr">April</option>
			<option value="May">May</option>
			<option value="Jun">June</option>
			<option value="Jul">July</option>
			<option value="Aug">August</option>
			<option value="Sept">September</option>
			<option value="Oct">October</option>
			<option value="Nov">November</option>
			<option value="Dec">December</option>
		</select>
	  
		<select name="days">
			<option>Day</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
			<option value="13">13</option>
			<option value="14">14</option>
			<option value="15">15</option>
			<option value="16">16</option>
			<option value="17">17</option>
			<option value="18">18</option>
			<option value="19">19</option>
			<option value="20">20</option>
			<option value="21">21</option>
			<option value="22">22</option>
			<option value="23">23</option>
			<option value="24">24</option>
			<option value="25">25</option>
			<option value="26">26</option>
			<option value="27">27</option>
			<option value="28">28</option>
			<option value="29">29</option>
			<option value="30">30</option>
			<option value="31">31</option>
		</select>

		<select name="year">
			<option>Year</option>
			<option value="2011">2018</option>
			<option value="2004">2017</option>
			<option value="2016">2016</option>
			<option value="2015">2015</option>
			<option value="2014">2014</option>
			<option value="2013">2013</option>
			<option value="2012">2012</option>
			<option value="2011">2011</option>
			<option value="2010">2010</option>
			<option value="2009">2009</option>
			<option value="2008">2008</option>
			<option value="2007">2007</option>
			<option value="2006">2006</option>
			<option value="2005">2005</option>
			<option value="2004">2004</option>
			<option value="2003">2003</option>
			<option value="2002">2002</option>
		</select><br>

		<br><label><b>Track<b></label><br>
		<select id="track" name="track">
			<option value=""></option>
			<option value="A">A</option>
			<option value="B">B</option>
			<option value="C">C</option>
			<option value="D">D</option>
		</select><br>
  
  <button type="submit" value="Submit">Submit</button>
  
</form>

</body>
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    for (var d = 0; d < dropdowns.length; d++) {
      var openDropdown = dropdowns[d];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
>>>>>>> c51cd2bf50de637ca2616749b70963cd1478f7b9
</html>

