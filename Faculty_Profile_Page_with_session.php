<?php

    session_start();
    //print all php session variables
    //echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';

    //test session id
    echo session_id();

    //test session domain
        echo ini_get('session.cookie_domain');

    if(isset($_SESSION['authorized']) && $_SESSION['authorized'] === TRUE){
        echo "authorized to enter this page!";
        session_unset($_SESSION['authorized']);
    } else {
        echo "not authorized to enter this page";
        session_unset($_SESSION['authorized']);
        header('Location: login_page_with_session.php');
    }
?>

<!DOCTYPE html>
<html>
<style>
form {
    border: 3px solid #f1f1f1;
}

input[type=text], input[type=password] {
    width: 15%;
    padding: 4px 10px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 4px 10px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 5%;
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

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
	
	span.reg {
       display: block;
       float: none;
    }
}
</style>

<body style="background-color:#F0EEEE;">
	
	<div class="imgcontainer">
		<img src="priaire.jpg" alt="priarie logo">
	</div>
	
<form action="action_page.php">
	<ul>
		<li class="dropdown">
			<a href="javascript:void(0)" class="dropbtn" onclick="myFunction()">Student</a>
			<div class="dropdown-content" id="myDropdown">
                <!--Student registration page link-->
				<a href="Student_Registration_Page_with_session.php">Add</a>
				<a href="#">Modify</a>
			</div>
		</li>
		<li class="dropdown">
			<a href="javascript:void(0)" class="dropbtn" onclick="myFunction2()">Calendar</a>
			<div class="dropdown-content" id="myDropdown2">
				<a href="#">Add</a>
				<a href="#">Modify</a>
			</div>
		</li>
		<li class="dropdown">
			<a href="javascript:void(0)" class="dropbtn" onclick="myFunction3()">Teacher</a>
			<div class="dropdown-content" id="myDropdown3">
                <!--faculty registration page link-->
				<a href="Faculty_Registration_Page_with_session.php">Add</a>
				<a href="#">Modify</a>
			</div>
		</li>		
	</ul>
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
		
		<button type="search" value="search">Search</button>
	</div>
	
	<div class="container">
		<iframe src="https://calendar.google.com/calendar/embed?src=pablams14%40gmail.com&ctz=America/Los_Angeles" style="border: 0" width="1350" height="600" frameborder="0" scrolling="no"></iframe>
	</div>
	
	</div>

</form>

</body>
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

function myFunction2() {
    document.getElementById("myDropdown2").classList.toggle("show");
}

function myFunction3() {
	document.getElementById("myDropdown3").classList.toggle("show");
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

</html>