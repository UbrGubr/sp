<?php

    session_start();
    //test session id
    //echo session_id();

    //test session domain
    //echo ini_get('session.cookie_domain');


    //print all php session variables
    //echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';

    if(isset($_SESSION['authorized']) && $_SESSION['authorized'] === TRUE){
        //echo "authorized to enter this page!";
       // session_unset($_SESSION['authorized']);
    } else {
        //echo "not authorized to enter this page";
        session_unset($_SESSION['authorized']);
        header('Location: login_page_with_session.php');
    }

	function convertNumToText($num)
	{
		switch($num)
		{
			case 0:
				return "Kin";
			case 1:
				return "1st";
			case 2:
				return "2nd";
			case 3:
				return "3rd";
			case 4:
				return "4th";
			case 5:
				return "5th";
			case 6:
				return "6th";
			default:
				return "---";
		}
	}

	function convertBoolToText($bool)
	{
		if($bool)
			return "Yes";
		else
			return "No";
	}

	static $conn;

	if(isset($_GET['fname']) && !empty($_GET['fname']) AND isset($_GET['lname']) && !empty($_GET['lname']) AND isset($_GET['idnum']) && !empty($_GET['idnum'])) {

		$fname = mysql_escape_string($_GET['fname']); // Set fname variable
        $lname = mysql_escape_string($_GET['lname']); // Set lname variable
        $idnum = mysql_escape_string($_GET['idnum']); // Set idnum variable


		if(!isset($conn))
		{
	      	$config = parse_ini_file('./config.ini');
			$conn = mysqli_connect('athena.ecs.csus.edu',$config['username'],$config['password'],$config['dbname']);
		}
		
		if(!$conn) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		}

		$query = mysqli_prepare($conn, "SELECT * FROM student WHERE fname=? AND lname=? AND sid=?"); // prepare query
		mysqli_stmt_bind_param($query, 'ssi', $fname, $lname, $idnum); // bind student information to query paramaters
		mysqli_stmt_execute($query);
		$result = mysqli_stmt_get_result($query);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);


		mysqli_stmt_close($query);
		mysqli_close($conn);


		// Initialize our text values
		$gradeText = $readingText = $mathText = $behavioralText = $emotionalText = $cognitiveText = $speechText = '';

		// Convert numerical values to text for more informative display
		foreach($row as $key => $val)
		{
			switch($key)
			{
				case 'gradelvl':
					$gradeText = convertNumToText($val);
					break;
				case 'readinglvl':
					$readingText = convertNumToText($val);
					break;
				case 'mathlvl':
					$mathText = convertNumToText($val);
					break;
				case 'behavioral':
					$behavioralText = convertBoolToText($val);
					break;
				case 'emotional':
					$emotionalText = convertBoolToText($val);
					break;
				case 'cognitive':
					$cognitiveText = convertBoolToText($val);
					break;
				case 'speech':
					$speechText = convertBoolToText($val);
					break;
			}

		}
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
</head>

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

.effectfront{
	border: none;
	margin: 0 auto;
}

.effectfront:hover{
	-webkit-transform: scale(1.5);
	-moz-transform: scale(1.5);
	-o-transform: scale(1.5);
	transform; scale(1.5);
	transform: all 0.3s;
	-webkit-transform: all 0.3s;
}


button {
    background-color: #4CAF50;
    color: white;
    padding: 4px 10px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    
}

.editButton{
	background-color: red;
	color: white;
	border: none;
	width: 100%;
	float: bottom;
}

.deleteButton{
	background-color: red;
	color: white;
	border: none;
	width: 100%;
	float: bottom
}

.hiddenButton{
	background-color: green;
	color: white;
	border: none;
	width: 100%;
	float: bottom;
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
    color: Blue;
    text-align: center;
    padding: 14px 16px;
}

</style>

<body style="background-color:#F0EEEE;">
	<div class="imgcontainer">
		<img src="http://blogs.egusd.net/prairie/files/2013/07/priaire-header-1r736jq.jpg" alt="priarie logo">
	</div>
	
	<div class="container-fluid">	 
		<div class="container">
			
			<h3>Student Profile</h3>
		
			<div class="row">
				<div class="col-sm-1">
					<a href="Faculty_Profile_Page_with_session.php">Home</a>
				</div>
				<div class="col-sm-10"></div>
				<div class="col-sm-1">
					<a href id="logoff">Logoff</a>
				</div>	
			</div>
			
		<div class "row">
			<div class="col-sm-6">
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
			
			</div>	
				<div class="col-sm-2"><button id="edButton" class="editButton" onclick="editStudent()">Edit Student</button></div>
				<div class="col-sm-2"><button id="deleteButton" class="deleteButton hidden" onclick="deleteStudent()">Delete Student</button></div>
				<div class="col-sm-2"><button id="changesButton" class="submitButton hidden" onclick="submitChanges()">Submit Changes</button></div>
		</div>

		
			<div class="row">
				<div class="col-sm-12">
					<h2 id='fname' style='display:inline-block'><?php echo $row['fname']/*." ".$row['lname']*/?></h2>
					<h2 id='lname' style='display:inline-block'><?php echo $row['lname']?></h2>
				
					<h2 style='display:inline-block; padding-left:80px'>ID: </h2>
					<h3 id='sid' style='display:inline-block'><?php echo $row['sid']?></h3>
					<p  id='errorMessage' class='hidden' style='color:red; display: inline-block; padding-left: 100px'>Error in a data field. Please try again.</p>
				</div>
			</div>
		
			<div class="row">
				<div class="col-sm-4"><!--left col-->
          			<div class="imgcontainer">
						<img class="effectfront" img src="https://rlv.zcache.com/little_girl_silhouette_5_x_7_photo_print-rb397f23ed99f480da092c7450a3a342e_fk95_8byvr_324.jpg" alt="girl" width="120" height="120">
						<br><br><br>
						
						<ul class="list-group">
							<strong>Joined:</strong><br>
							
							<strong>Grade Level: 
								<select id='editGrade' style='width:50px' class='hidden'>
									<option hidden><?php echo $gradeText?></option>
									<option value='0'>Kin</option>
									<option value='1'>1st</option>
									<option value='2'>2nd</option>
									<option value='3'>3rd</option>
									<option value='4'>4th</option>
									<option value='5'>5th</option>
									<option value='6'>6th</option>
								</select>
								<div id='gradeInfo' style='display:inline'><?php echo $gradeText?></div></strong><br>
							
							<strong>Track: 
								<select id='editTrack' style='width:50px' class='hidden'>
									<option hidden><?php echo $row['trackid']?></option>
									<option value='A'>A</option>
									<option value='B'>B</option>
									<option value='C'>C</option>
									<option value='D'>D</option>
								</select>
								<div id='trackInfo' style='display:inline'><?php echo $row['trackid']?></div></strong>
						</ul> 
					</div>    
				</div><!--/col-3-->
			
				<div class="col-sm-8">
			  
					<ul class="nav nav-tabs" id="myTab">
						<li class="active"><a href="#home" data-toggle="tab">Assessments</a></li>
						<li><a href="#messages" data-toggle="tab">Upcoming Dates</a></li>
						<li><a href="#notes" data-toggle="tab">Student Notes</a></li>
					</ul>
				  
					<div class="tab-content">
						<div class="tab-pane active" id="home">
							<div class="table-responsive">
								<table class="table table-hover">
									<thead>
										<tr>
											<th>Reading Level</th>
											<th>Math Level</th>
											<th>Behavioral</th>
											<th>Emotional</th>
											<th>Cognitive</th>
											<th>Speech/Language</th>
										</tr>
									</thead>
									<tbody id="items">
										<tr>
											<td id='readingData'><?php echo $readingText?></td>
											<td id='mathData'><?php echo $mathText?></td>
											<td id='behavioralData'><?php echo $behavioralText?></td>
											<td id='emotionalData'><?php echo $emotionalText?></td>
											<td id='cognitiveData'><?php echo $cognitiveText?></td>
											<td id='speechData'><?php echo $speechText?></td>

											<!--hidden text boxes to be toggled on student edit -->
											<td id='editReadingData' class="hidden">
												<select id='editReadingDataText' class='hidden' style='width:90px'>
													<option hidden><?php echo $readingText?></option>
													<option value='0'>Kin</option>
													<option value='1'>1st</option>
													<option value='2'>2nd</option>
													<option value='3'>3rd</option>
													<option value='4'>4th</option>
													<option value='5'>5th</option>
													<option value='6'>6th</option>
												</select>
											</td>
											

											<td id='editMathData' class="hidden">
												<select id='editMathDataText' class='hidden' style='width:90px'>
												<option hidden><?php echo $mathText?></option>
													<option value='0'>Kin</option>
													<option value='1'>1st</option>
													<option value='2'>2nd</option>
													<option value='3'>3rd</option>
													<option value='4'>4th</option>
													<option value='5'>5th</option>
													<option value='6'>6th</option>
												</select>
											</td>

											<td id='editBehavioralData' class="hidden">
												<select id='editBehavioralDataText' class='hidden' style='width:90px'>
												<option hidden><?php echo $behavioralText?></option>
													<option value='0'>Negative</option>
													<option value='1'>Positive</option>
												</select>
											</td>

											<td id='editEmotionalData' class="hidden">
												<select id='editEmotionalDataText' class='hidden' style='width:90px'>
													<option hidden><?php echo $emotionalText?></option>
													<option value='0'>Negative</option>
													<option value='1'>Positive</option>
												</select>
											</td>

											<td id='editCognitiveData' class="hidden">
												<select id='editCognitiveDataText' class='hidden' style='width:90px'>
												<option hidden><?php echo $cognitiveText?></option>
													<option value='0'>Negative</option>
													<option value='1'>Positive</option>
												</select>
											</td>

											<td id='editSpeechData' class="hidden">
												<select id='editSpeechDataText' class='hidden' style='width:90px'>
												<option hidden><?php echo $speechText?></option>
													<option value='0'>Negative</option>
													<option value='1'>Positive</option>
												</select>
											</td>
										</tr>
										
										<!--table row for assessment checkboxes-->
										<tr>
											<td id='readingCheckBox' class='hidden' align='center'>
												<input type='checkbox' id='readingAssessment'>
											</td>
											<td id='mathCheckBox' class='hidden' align='center'>
												<input type='checkbox' id='mathAssessment'>
											</td>
											<td id='behavioralCheckBox' class='hidden' align='center'>
												<input type='checkbox' id='behavioralAssessment'>
											</td>
											<td id='emotionalCheckBox' class='hidden' align='center'>
												<input type='checkbox' id='emotionalAssessment'>
											</td>
											<td id='cognitiveCheckBox' class='hidden' align='center'>
												<input type='checkbox' id='cognitiveAssessment'>
											</td>
											<td id='speechCheckBox' class='hidden' align='center'>
												<input type='checkbox' id='speechAssessment'>
											</td>
										</tr>
										<tr>
											<td colspan='6' id='instruction' class='hidden' align='center' style='font-size:small; color:green'>
												If Assessment has been completed check the corresponding box.
											</td>
										</tr>
									</tbody>
								</table>
							
								<div class="row">
									<div class="col-md-4 col-md-offset-4 text-center">
										<ul class="pagination" id="myPager"></ul>
									</div>
								</div>
							</div><!--/table-resp-->

							<h4>Alerts</h4>
						  
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

						</div><!--/tab-pane-->
						
						<div class="tab-pane" id="messages">
									 
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
		</div>
	</div>


	<!--edit mode; toggle editable fields-->
	<script type="text/javascript">

	function editStudent(){

		//console.log("button clicked!");

		//hide edit button and show submit button
		$('#edButton').addClass('hidden');
		$('#changesButton').removeClass('hidden');

		//hide default table cells 
		$('#readingData').addClass('hidden');
		$('#mathData').addClass('hidden');
		$('#behavioralData').addClass('hidden');
		$('#emotionalData').addClass('hidden');
		$('#cognitiveData').addClass('hidden');
		$('#speechData').addClass('hidden');
		$('#gradeInfo').addClass('hidden');
		$('#trackInfo').addClass('hidden');

		//show hidden table cells
		$('#editReadingData').removeClass('hidden');
		$('#editMathData').removeClass('hidden');
		$('#editBehavioralData').removeClass('hidden');
		$('#editEmotionalData').removeClass('hidden');
		$('#editCognitiveData').removeClass('hidden');
		$('#editSpeechData').removeClass('hidden');

		//show hidden assessment checkboxes
		$('#readingCheckBox').removeClass('hidden');
		$('#mathCheckBox').removeClass('hidden');
		$('#behavioralCheckBox').removeClass('hidden');
		$('#emotionalCheckBox').removeClass('hidden');
		$('#cognitiveCheckBox').removeClass('hidden');
		$('#speechCheckBox').removeClass('hidden');
		$('#instruction').removeClass('hidden');

		//show dropdowns on corresponding table cells
		$('#editReadingDataText').removeClass('hidden');
		$('#editMathDataText').removeClass('hidden');
		$('#editBehavioralDataText').removeClass('hidden');
		$('#editEmotionalDataText').removeClass('hidden');
		$('#editCognitiveDataText').removeClass('hidden');
		$('#editSpeechDataText').removeClass('hidden');
		$('#editGrade').removeClass('hidden');
		$('#editTrack').removeClass('hidden');

		//show hidden delete student button
		$('#deleteButton').removeClass('hidden');

	}
	</script>

	<script type='text/javascript'>

	//when Submit Changes button is clicked submit to database
	function submitChanges(){
		//console.log('Student Info Submitted!');

		//save values in all text fields
		var readinglvl = document.getElementById('editReadingDataText').value;
		var mathlvl = document.getElementById('editMathDataText').value;
		var behavioral = document.getElementById('editBehavioralDataText').value;
		var emotional = document.getElementById('editEmotionalDataText').value;
		var cognitive = document.getElementById('editCognitiveDataText').value;
		var speech = document.getElementById('editSpeechDataText').value;
		var gradelvl = document.getElementById('editGrade').value;
		var trackid = document.getElementById('editTrack').value;
		var sid = $('#sid').html();
		var fname = $('#fname').html();
		var lname = $('#lname').html();

		//vars for final formatted assessment dates
		var finalReadingDate = null;
		var finalMathDate = null;
		var finalBehavioralDate = null;
		var finalEmotionalDate = null;
		var finalCognitiveDate = null;
		var finalSpeechDate = null;;

		//completed assessments true false vals
		var readingTaken = 0;
		var mathTaken = 0;
		var behavioralTaken = 0;
		var emotionalTaken = 0;
		var cognitiveTaken = 0;
		var speechTaken = 0;


		//if readingAssessment is checked format date
		if(document.getElementById('readingAssessment').checked){
			readingTaken = 1;
			finalReadingDate = formatDate();
		}

		//if mathAssessment is checked
		if(document.getElementById('mathAssessment').checked){
			mathTaken = 1;
			finalMathDate = formatDate();
		}

		//if behavioralAssessment is checked
		if(document.getElementById('behavioralAssessment').checked){
			behavioralTaken = 1;
			finalBehavioralDate = formatDate();
		}

		//if emotionalAssessment is checked
		if(document.getElementById('emotionalAssessment').checked){
			emotionalTaken = 1;
			finalEmotionalDate = formatDate();
		}

		//if cognitive is checked
		if(document.getElementById('cognitiveAssessment').checked){
			cognitiveTaken = 1;
			finalCognitiveDate = formatDate();
		}

		// if speech is checked
		if(document.getElementById('speechAssessment').checked){
			speechTaken = 1;
			finalSpeechDate = formatDate();
		}
	

		//do ajax call to update db to correct assessment dates and values if any checkbox was checked
		if(finalReadingDate !== null){
			updateReadingAssessment(readingTaken, finalReadingDate, sid);
		}

		if(finalMathDate !== null){
			updateMathAssessment(mathTaken, finalMathDate, sid);
		}

		if(finalBehavioralDate !== null){
			updateBehavioralAssessment(behavioralTaken, finalBehavioralDate, sid);
		}

		if(finalEmotionalDate !== null){
			updateEmotionalAssessment(emotionalTaken, finalEmotionalDate, sid);
		}

		if(finalCognitiveDate !== null){
			updateCognitiveAssessment(cognitiveTaken, finalCognitiveDate, sid);
		}

		if(finalSpeechDate !== null){
			updateSpeechAssessment(speechTaken, finalSpeechDate, sid);
		}
		/*	$.ajax({
				type: 'POST',
				url: 'edit_student_data.php',
				data: { READINGTAKEN: readingTaken, FINALREADINGDATE: finalReadingDate, 
						MATHTAKEN: mathTaken, FINALMATHDATE: finalMathDate, 
						BEHAVIORALTAKEN: behavioralTaken, FINALBEHAVIORALDATE: finalBehavioralDate,
						EMOTIONALTAKEN: emotionalTaken, FINALEMOTIONALDATE: finalEmotionalDate, 
						COGNITIVETAKEN: cognitiveTaken, FINALCOGNITIVEDATE: finalCognitiveDate,
						SPEECHTAKEN: speechTaken, FINALSPEECHDATE: finalSpeechDate },
				error: function(a,b,c){
					console.log(a);
					console.log(b);
					console.log(c);
				}
			}); 	*/

		//scrub grade lvl values for database compatibility

		//check for kin lvl grades
		if(readinglvl.search('Kin') !== -1){
			readinglvl = '0';
		}

		if(mathlvl.search('Kin') !== -1){
			mathlvl = '0';
		}

		if(gradelvl.search('Kin') !== -1){
			gradelvl = '0';
		}

		//check for alpha chars in int only db fields
		if(readinglvl.search(/[a-zA-Z]/)){
			readinglvl = readinglvl.substring(0,1);
		}

		if(mathlvl.search(/[a-zA-Z]/)){
			mathlvl = mathlvl.substring(0,1);
		}

		if(gradelvl.search(/[a-zA-Z]/)){
			gradelvl = gradelvl.substring(0,1);
		}

		//search for positive or negative value in true false db fields
		if(behavioral === 'No'){
			behavioral = '0';
		}

		if(behavioral === 'Yes'){
			behavioral = '1';
		}

		if(emotional === 'No'){
			emotional = '0';
		}

		if(emotional === 'Yes'){
			emotional = '1';
		}

		if(cognitive === 'No'){
			cognitive = '0';
		}

		if(cognitive === 'Yes'){
			cognitive = '1';
		}

		if(speech === 'No'){
			speech = '0';
		}

		if(speech === 'Yes'){
			speech = '1';
		}

		$.ajax({
			type: 'POST',
			url: 'edit_student_data.php',
			data: {READINGLVL: readinglvl, MATHLVL: mathlvl, BEHAVIORAL: behavioral, EMOTIONAL: emotional,
					COGNITIVE: cognitive, SPEECH: speech, GRADELVL: gradelvl, TRACKID: trackid, SID: sid },
			//on success remove editable fields
			success: function(response){

						var trimmedResponse = $.trim(response);
						console.log(trimmedResponse);

						if(trimmedResponse === 'successful'){
							//hide dropdowns
							$('#editReadingDataText').addClass('hidden');
							$('#editMathDataText').addClass('hidden');
							$('#editBehavioralDataText').addClass('hidden');
							$('#editEmotionalDataText').addClass('hidden');
							$('#editCognitiveDataText').addClass('hidden');
							$('#editSpeechDataText').addClass('hidden');
							$('#editGrade').addClass('hidden');
							$('#editTrack').addClass('hidden');

							//hide table cells containing dropdowns
							$('#editReadingData').addClass('hidden');
							$('#editMathData').addClass('hidden');
							$('#editBehavioralData').addClass('hidden');
							$('#editEmotionalData').addClass('hidden');
							$('#editCognitiveData').addClass('hidden');
							$('#editSpeechData').addClass('hidden');

							//show default table cells 
							$('#readingData').removeClass('hidden');
							$('#mathData').removeClass('hidden');
							$('#behavioralData').removeClass('hidden');
							$('#emotionalData').removeClass('hidden');
							$('#cognitiveData').removeClass('hidden');
							$('#speechData').removeClass('hidden');
							$('#gradeInfo').removeClass('hidden');
							$('#trackInfo').removeClass('hidden');

							//show edit student button && hide submit button
/*							$('#edButton').removeClass('hidden');
							$('#submitButton').addClass('hidden');
*/
							window.location.href = 'Student_Profile_Page_with_session.php?fname='+fname+'&lname='+lname+
													'&idnum='+sid;

						} else {
							console.log('error in changes');
							$('#errorMessage').removeClass('hidden');
						}
					},
			//on error show error message 
			error: function(a,b,c){
						console.log(a);
						console.log(b);
						console.log(c);	
					}
		});

	}
	</script>

	<script type='text/javascript'>

	function deleteStudent(){
		console.log("student shit-canned!");

		var sid = $('#sid').html();

		$.ajax({
			type: 'POST',
			url: 'delete_student.php',
			data: {SID: sid},
			success: function(response){
				var trimmedResponse = $.trim(response);

				if(trimmedResponse == 'successful'){
					console.log('successfully deleted student');
					window.location.href = 'Student_Search_Page.php';
				}
			},
			error: function(a,b,c){
				console.log(a);
				console.log(b);
				console.log(c);
			}
		});

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

	<!--function for formating dates to database compatible form-->
	<script type='text/javascript'>
	function formatDate(){
		var d = new Date();
		var Y = d.getFullYear();
		var M = d.getMonth();
		M = M + 1;
		var D = d.getDate();
		var formattedDate = Y + '/' + M + '/' + D;

		return formattedDate;

	}
	</script>

	<!--update reading assessment data-->
	<script type='text/javascript'>
	function updateReadingAssessment(readingTaken, finalReadingDate, sid){
		$.ajax({
				type: 'POST',
				url: 'update_read_assessment.php',
				data: { READINGTAKEN: readingTaken, FINALREADINGDATE: finalReadingDate, SID: sid },
				error: function(a,b,c){
					console.log(a);
					console.log(b);
					console.log(c);
				}
			}); 
	}
	</script>

	<!--update math assessment data-->
	<script type='text/javascript'>
	function updateMathAssessment(mathTaken, finalMathDate, sid){
		$.ajax({
				type: 'POST',
				url: 'update_math_assessment.php',
				data: { MATHTAKEN: mathTaken, FINALMATHDATE: finalMathDate, SID: sid },
				error: function(a,b,c){
					console.log(a);
					console.log(b);
					console.log(c);
				}
			}); 
	}
	</script>

	<!--update behavioral assessment data-->
	<script type='text/javascript'>
	function updateBehavioralAssessment(behavioralTaken, finalBehavioralDate, sid){
		$.ajax({
				type: 'POST',
				url: 'update_behavioral_assessment.php',
				data: { BEHAVIORALTAKEN: behavioralTaken, FINALBEHAVIORALDATE: finalBehavioralDate, SID: sid },
				error: function(a,b,c){
					console.log(a);
					console.log(b);
					console.log(c);
				}
			}); 
	}
	</script>

	<!--update emotional assessment data-->
	<script type='text/javascript'>
	function updateEmotionalAssessment(emotionalTaken, finalEmotionalDate, sid){
		$.ajax({
				type: 'POST',
				url: 'update_emotional_assessment.php',
				data: { EMOTIONALTAKEN: emotionalTaken, FINALEMOTIONALDATE: finalEmotionalDate, SID: sid },
				error: function(a,b,c){
					console.log(a);
					console.log(b);
					console.log(c);
				}
			}); 
	}
	</script>

	<!--update cognitive assessment data-->
	<script type='text/javascript'>
	function updateCognitiveAssessment(cognitiveTaken, finalCognitiveDate, sid){
		$.ajax({
				type: 'POST',
				url: 'update_cognitive_assessment.php',
				data: { COGNITIVETAKEN: cognitiveTaken, FINALCOGNITIVEDATE: finalCognitiveDate, SID: sid },
				error: function(a,b,c){
					console.log(a);
					console.log(b);
					console.log(c);
				}
			}); 
	}
	</script>

	<!--update speech assessment data-->
	<script type='text/javascript'>
	function updateSpeechAssessment(speechTaken, finalSpeechDate, sid){
		console.log(speechTaken);
		console.log(finalSpeechDate);
		$.ajax({
				type: 'POST',
				url: 'update_speech_assessment.php',
				data: { SPEECHTAKEN: speechTaken, FINALSPEECHDATE: finalSpeechDate, SID: sid },
				error: function(a,b,c){
					console.log(a);
					console.log(b);
					console.log(c);
				}
			}); 
	}
	</script>
</body>

</html>
