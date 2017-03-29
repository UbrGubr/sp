<?php

	
	
    // Define connection as a static variable, to avoid connecting more than once 
    static $connection;

    // Try and connect to the database, if a connection has not been established yet
    if(!isset($connection)) {
         // Load configuration as an array. Use the actual location of your configuration file
        $config = parse_ini_file('./config.ini'); 
        $connection = mysql_connect('athena.ecs.csus.edu',$config['username'],$config['password'],$config['dbname']);
    }

    // If connection was not successful, handle the error
    if($connection === false) {
        // Handle error - notify administrator, log to a file, show an error screen, etc.
        error_log("no connection made", 0);
		return mysqli_connect_error(); 
    } else {
		//echo "Connection made");
	}
    //return $connection;


	@mysql_select_db($config['dbname']);
	
			$uid = $_REQUEST['un'];
			$pw = $_REQUEST['pw'];
			
			
	mysql_query("INSERT INTO TestTable (id, firstname, lastname) VALUE ('', '$uid', '$pw')");
	
	
	mysql_close($connection);

	echo "$pw";
?>