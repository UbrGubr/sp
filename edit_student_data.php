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

	//table field names
	$readinglvl = $_REQUEST[READINGLVL];
	$mathlvl = $_REQUEST[MATHLVL];
	$behavioral = $_REQUEST[BEHAVIORAL];
	$emotional = $_REQUEST[EMOTIONAL];
	$cognitive = $_REQUEST[COGNITIVE];
	$speech = $_REQUEST[SPEECH];
	$gradelvl = $_REQUEST[GRADELVL];
	$trackid = $_REQUEST[TRACKID];
	$sid = $_REQUEST[SID];

	//test data
/*	$readinglvl = 0;
	$mathlvl = 0;
	$behavioral = 0;
	$emotional = 0;
	$cognitive = 0;
	$speech = 0;
	$gradelvl = 0;
	$trackid = 0;
	$sid = 66666;	*/

	//build query string
	$qry = "UPDATE student SET readinglvl=".$readinglvl.", mathlvl=".$mathlvl.", behavioral=".$behavioral.",
			emotional=".$emotional.", cognitive=".$cognitive.", speech=".$speech.", gradelvl=".$gradelvl.", 
			trackid='".$trackid."' WHERE sid=".$sid.";"; 

	//validate student edit
	if(mysqli_query($connection, $qry)){
		echo "successful";
	} else {
		echo "fail";
	}

	//close database connection
	mysqli_close($connection);
?>