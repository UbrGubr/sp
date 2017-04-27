<?php

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

	//get student id variable from ajax call
	$sid = $_REQUEST[SID];

	//test data
	//$sid = 99999;

	//build sql delete query
	$query = 'DELETE FROM student WHERE sid = ' . $sid;

	if(mysqli_query($connection, $query)){
		echo "successful";
	} else {
		echo "fail";
	}

	//close database connection
	mysqli_close($connection);

?>