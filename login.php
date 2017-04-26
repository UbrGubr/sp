<?php

	
	
    // Define connection as a static variable, to avoid connecting more than once 
    static $connection;

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
	
	
	//test data
	//$email = "tomtheteacher@prairieschool.com";
	//$pw = "!password1";
	

	//assign userName and password to local variables
	$email = $_REQUEST['email'];
	$pw = $_REQUEST['pw'];


	//build query to select current user password data
	$query = "SELECT hash FROM teacher WHERE email='$email'";
	
	//query db, store result as array in $storedHash
	$result = mysqli_query($connection,$query);
	$storedHash = mysqli_fetch_assoc($result);
	
	//select authentication variable for account activation verification
	$authQuery = "SELECT  activated FROM teacher WHERE email='$email'";
	$authResult = mysqli_query($connection,$authQuery);
	$storedAuthVal = mysqli_fetch_assoc($authResult);

	//store query array keys into an array
	$arrayKeys = array_keys($storedAuthVal);
	//echo $storedAuthVal[$arrayKeys[0]];				<---test value
	
	$authVal = $storedAuthVal[$arrayKeys[0]];
	
	//check account validation; password match
	if($authVal != 1){
		echo "notApproved";
	}else if(password_verify($pw, $storedHash["hash"])){		//verify password with $storedHash
		echo "ok";
	}else{
		echo "password authentication failed";
	}
	
	mysqli_free_result($result);
	
	mysqli_close($connection);
?>	