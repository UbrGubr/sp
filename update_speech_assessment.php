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

	
	$speechTaken = $_REQUEST[SPEECHTAKEN];
	$finalSpeechDate = $_REQUEST[FINALSPEECHDATE];
	$sid = $_REQUEST[SID];
	

	//build query string
	$qry="UPDATE assessment SET speechComplete =".$speechTaken.", speechCompleteDate='".$finalSpeechDate."' WHERE sid=".$sid.";";

	//validate student edit
	if(mysqli_query($connection, $qry)){
		echo "successful";
	} else {
		echo "fail";
	}

	//close database connection
	mysqli_close($connection);

?>