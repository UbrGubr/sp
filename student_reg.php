<?php

    // Define connection as a static variable, to avoid connecting more than once 
    static $connection;

	$fname = $mname = $lname = $idnum = $phone = $address = $gender = $grade = $read = $math = $behave = $emotion = $cognitive = $speech = $track = '';

    // Try and connect to the database, if a connection has not been established yet
    if(!isset($connection)) {
         // Load configuration as an array. Use the actual location of your configuration file
        $config = parse_ini_file('./config.ini'); 
        $connection = mysqli_connect('athena.ecs.csus.edu',$config['username'],$config['password'],$config['dbname']);
    }

    // If connection was not successful, handle the error
    if(mysqli_connect_errno()){
		echo "failed to connect to MYSQL: " . mysqli_connect_error();
	}

			$idnum = $_REQUEST['IDNUM'];
			$fname = $_REQUEST['FIRSTNAME'];
			$mname = $_REQUEST['MIDNAME'];
			$lname = $_REQUEST['LASTNAME'];
			$phone = $_REQUEST['PHONE'];
			$address = $_REQUEST['ADDRESS'];
			$gender = $_REQUEST['GENDER'];
			$grade = $_REQUEST['GRADE'];
			$read = $_REQUEST['READLVL'];
			$math = $_REQUEST['MATHLVL'];
			$behave = $_REQUEST['BEHAVE'];
			$cognitive = $_REQUEST['COGNITIVE'];
			$speech = $_REQUEST['SPEECH'];
			$emotion = $_REQUEST['EMOTIONAL'];
			$track = $_REQUEST['TRACK'];
			
			$eFName = $_REQUEST['EFIRSTNAME'];
			$eLName = $_REQUEST['ELASTNAME'];
			$relation = $_REQUEST['ERELATION'];
			$ePhone = $_REQUEST['EPHONE'];
			$eMail = $_REQUEST['EMAIL'];
			
	// Add Contact
	if(mysqli_query($connection,"INSERT INTO emergency_cont (fname, lname, phone, email, relationship, sid) VALUES ('$eFName', '$eLName', '$ePhone', '$eMail', '$relation', '$idnum')"))
	{
		echo "successful\n";
	} else {
		echo "not successful\n";
	}
	
	// Get contact id
	$contactId = mysqli_fetch_assoc(mysqli_query($connection, "SELECT contactid FROM emergency_cont WHERE sid = '$idnum'"));
	$cid = $contactId['contactid'];
	
	// Add student into database
	if(mysqli_query($connection,"INSERT INTO student VALUES ('$idnum', '$fname', '$mname',
					'$lname', '$gender', '$track', '$phone', '$address', '19900823', '$cid', '$grade', '$read', '$math', '20170520', '$behave', '$cognitive', '$emotion', '$speech')"))
	{
		echo "successful\n";
	} else {
		echo "not successful\n";
	}
	
	/*/ Add student into database
	if(mysqli_query($connection,"INSERT INTO student VALUES ('$idnum', '$fname', '$mname',
					'$lname', '$gender', '$track', '$phone', '$address', '19900823', 12345, $grade, $read, $math, '20170520', $behave, $cognitive, $emotion, $speech)"))
	{
		echo "successful\n";
	} else {
		echo "not successful\n";
	}*/

	if(mysqli_query($connection,"INSERT INTO assessment (sid,readComplete,mathComplete,behaviorComplete,emotionComplete,cognitiveComplete,speechComplete) VALUES ('$idnum',0,0,0,0,0,0)"))
	{
		echo "successful\n";
	} else {
		echo "not successful\n";
	} 

	mysqli_close($connection);

	echo "Complete\n";

?>
