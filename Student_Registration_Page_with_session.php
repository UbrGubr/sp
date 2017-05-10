
<?php
	//start session
    session_start();

    //echo $_SESSION['authorized'];

    //check whether user is authorized to enter this page
    if(isset($_SESSION['authorized']) && $_SESSION['authorized'] === TRUE){
        //echo "authorized to enter this page!";
    } else {
        echo "not authorized to enter this page";
        session_unset($_SESSION['authorized']);
        header('Location: login_page_with_session.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
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

input[type="text"]#edate {
	width: 100%;
	padding: 6px 10px;
	margin: 8px 0;
	display: inline-block;
	border: 1px solid #ccc;
	box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 475px;
    border: none;
    cursor: pointer;
    width: 10%;
}

button2 {
    background-color: #4CAF50;
    color: white;
    padding: 4px 10px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
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
	
	<div class="container-fluid">	 
		<div class="container">
			
			<h3>Register New Student</h3>
		
			<div class="row">
				<div class="col-sm-1">
					<div class="dropdown">
						<button2 class="btn btn-default dropdown-toggle" type="button" onclick="linkHome()"><a href="Faculty_Profile_Page_with_session.php">Home</a></button2>
					</div>
				</div>
				<div class="col-sm-10"></div>
				<div class="col-sm-1">
						<button2 class="btn btn-default pull-right" type="button" id="logoff">Logoff</button2>
				</div>
			</div>

			<form action="">
				<div class="container">
					<label><b>First Name</b></label>
					<input type="text" id="firstName" placeholder="Enter first name" required>
					
					<label><b>Middle Name</b></label>
					<input type="text" id="middleName" placeholder="Enter middle name" required>
					
					<label><b>Last Name</b></label>
					<input type="text" id="lastName" placeholder="Enter last name" required>

					<label><b>ID Number</b></label>
					<input type="text" id="ID" placeholder="Enter ID number" required>
					
					<label><b>Phone Number</b></label>
					<input type="text" id="phoneNumber" placeholder="Enter phone number" required>
					
					<label><b>Address</b></label>
					<input type="text" id="address" placeholder="Enter address" required>
					
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
							<select id="gradeLvl" name="gradelevel">
								<option value="grade">Grade</option>
								<option value="0">Kindergarten</option>
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
							<select id="readLvl" name="readinglevel">
								<option value="grade">Grade</option>
								<option value="0">Kindergarten</option>
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
							<select id="mathLvl" name="mathlevel">
								<option value="grade">Grade</option>
								<option value="0">Kindergarten</option>
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
								<option value="1">Yes</option>
								<option value="0">No</option>
							</select><br><br>
						</div>
						<div class="col-sm-1">
							<label><b>Emotional<b></label><br>
							<select id="emotional" name="emotional">
								<option value="">Y/N</option>
								<option value="1">Yes</option>
								<option value="0">No</option>
							</select><br><br>	
						</div>
						<div class="col-sm-1">
							<label><b>Cognitive<b></label><br>
							<select id="cognitive" name="cognitive">
								<option value="">Y/N</option>
								<option value="1">Yes</option>
								<option value="0">No</option>
							</select><br><br>
						</div>
						<div class="col-sm-1">
							<label><b>Speech/Language<b></label><br>
							<select id="speech/language" name="speech/language">
								<option value="">Y/N</option>
								<option value="1">Yes</option>
								<option value="0">No</option>
							</select><br><br>
						</div>
						<div class="col-sm-1"></div>
						<div class="col-sm-1">
							<label><b>Enrollement Date<b><label>
						</div>
						<div class="col-sm-1">
							<input type="text" id="edate">						
						</div>
					   </div>					
					<div class="row">
						<div class="col-sm-3">
							<label><b>Date of Birth<b></label><br>
							<select id="birthdayMonth" name="months">
								<option value="">Month</option>
								<option value="01">January</option>
								<option value="02">February</option>
								<option value="03">March</option>
								<option value="04">April</option>
								<option value="05">May</option>
								<option value="06">June</option>
								<option value="07">July</option>
								<option value="08">August</option>
								<option value="09">September</option>
								<option value="10">October</option>
								<option value="11">November</option>
								<option value="12">December</option>
							</select>
				  
							<select id="birthdayDay" name="days">
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

							<select id="birthdayYear" name="year">
								<option>Year</option>
								<option value="2018">2018</option>
								<option value="2017">2017</option>
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
							</select>
						</div>
						<div class="col-sm-1">
							<label><b>Track<b></label>
							<select id="track" name="track">
								<option value=""></option>
								<option value="A">A</option>
								<option value="B">B</option>
								<option value="C">C</option>
								<option value="D">D</option>
							</select><br><br>
						</div>
			
					</div>
					<h3>Emergency Contact Info</h3>
						
					<label><b>First Name</b></label>
					<input type="text" id="eFirstName" placeholder="Enter first name" required>
									
					<label><b>Last Name</b></label>
					<input type="text" id="eLastName" placeholder="Enter last name" required>

					<label><b>Relationship</b></label>
					<input type="text" id="eRelationship" placeholder="Enter relationship" required>
					
					<label><b>Phone Number</b></label>
					<input type="text" id="ePhone" placeholder="Enter phone number" required>
					
					<label><b>Email</b></label>
					<input type="text" id="eEmail" placeholder="Enter email" required>
				
			  	  <button type="submit" value="Submit" id="submitData" onclick="whenClicked()">Submit</button>
				</div>
			</form>
		</div>
	</div>
</body>

<script>
	$(function() {
		$("#edate").datepicker();
	});
</script>

<script type="text/javascript">
	
	var err = 0;
	var firstName, midName, lastName, idNum, phone, addr, gend, grade, read, math, behave, emote, cog, speech, trackID, eFName, eLName, eRelation, ePh, eMail;
	
	function whenClicked(){	

		console.log("Got here1!");
		
		//save all student values of data except track into a variable
		firstName = document.getElementById('firstName').value;
		midName = document.getElementById('middleName').value;
		lastName = document.getElementById('lastName').value;
		idNum = document.getElementById('ID').value;
		phone = document.getElementById('phoneNumber').value;
		addr = document.getElementById('address').value;
		
		if(document.getElementById('gender').value=="male"){
			gend = "M";
		}else if(document.getElementById('gender').value=="female"){
			gend = "F";
		}else{
			err++;
			window.alert("Include gender for student.");
		}
		
		if(document.getElementById('gradeLvl').value=="grade"){
			err++;
			window.alert("Include grade level for student.");
		}else{
			grade = document.getElementById('gradeLvl').value;
		}
		
		if(document.getElementById('readLvl').value=="grade"){
			err++;
			window.alert("Include reading level for student.");
		}else{
			read = document.getElementById('readLvl').value;
		}
		
		if(document.getElementById('mathLvl').value=="grade"){
			err++;
			window.alert("Include math level for student.");
		}else{
			math = document.getElementById('mathLvl').value;
		}
		
		if(document.getElementById('behavioral').value==""){
			err++;
			window.alert("Include behavioral result for student.");
		}else{
			behave = document.getElementById('behavioral').value;
		}
		
		if(document.getElementById('emotional').value==""){
			err++;
			window.alert("Include emotional result for student.");
		}else{
			emote = document.getElementById('emotional').value;
		}
		
		if(document.getElementById('cognitive').value==""){
			err++;
			window.alert("Include cognitive result for student.");
		}else{
			cog = document.getElementById('cognitive').value;
		}
		
		if(document.getElementById('speech/language').value==""){
			err++;
			window.alert("Include speech/language result for student.");
		}else{
			speech = document.getElementById('speech/language').value;
		}
		
		if(document.getElementById('track').value==""){
			err++;
			window.alert("Include track path for student.");
		}else{
			trackID = document.getElementById('track').value;
		}
		
		//Emergency stuff
		eFName = document.getElementById('eFirstName').value;
		eLName = document.getElementById('eLastName').value;
		eRelation = document.getElementById('eRelationship').value;
		ePh = document.getElementById('ePhone').value;
		eMail = document.getElementById('eEmail').value;
		
		if(err==0){
			runAJAX();
		}
	}								
		//ajax call to send data to php script	
								
	function runAJAX(){	
		// run AJAX for student info
		$.ajax({
			type:	'POST',
			url:	'student_reg.php',
			data:	{ FIRSTNAME: firstName, MIDNAME: midName, LASTNAME: lastName, IDNUM: idNum, PHONE: phone, ADDRESS: addr, GENDER: gend, GRADE: grade,
						READLVL: read, MATHLVL: math, BEHAVE: behave, EMOTIONAL: emote, COGNITIVE: cog, SPEECH: speech, TRACK: trackID, 
						EFIRSTNAME: eFName, ELASTNAME: eLName, ERELATION: eRelation, EPHONE: ePh, EMAIL: eMail, },
			success: function(){ 
						console.log('data stored successfully'); 
						//window.alert("succesfully registered!");
						window.location.href="Student_Registration_Page_with_session.php";
			},
			error:	function(a,b,c){ 
						console.log(a);
						console.log(b);
						console.log(c);
			}
		});	
		
	}

</script>

	
	<script type="text/javascript">
		function linkHome(){
			window.location.href = "Faculty_Profile_Page_with_session.php";
		}
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

