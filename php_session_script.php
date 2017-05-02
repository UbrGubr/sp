<?php

	static $connection;

	$log_file = 'auth.log';
	$email = mysql_escape_string($_POST['email']);

	// Try and connect to the database, if a connection has not been established yet
    if(!isset($connection)) {
		$config = parse_ini_file('./config.ini');
        $connection = mysqli_connect('athena.ecs.csus.edu',$config['username'],$config['password'],$config['dbname']);
    }


    // If connection was not successful, handle the error
    if(mysqli_connect_errno()){
		$error = mysqli_connect_error();
		file_put_contents($log_file, "Connect failed: $error\n");
		exit();
    }

    $query = mysqli_prepare($connection, "SELECT tid FROM teacher WHERE email=?"); // prepare query
    mysqli_stmt_bind_param($query, 's', $email); // bind student information to query paramaters
   	mysqli_stmt_execute($query);
    $result = mysqli_stmt_get_result($query);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$tid = $row['tid'];


	mysqli_stmt_close($query);
    mysqli_close($connection);


	session_start();
    $_SESSION['authorized'] = true;
    $_SESSION['tid'] = $tid;


    if(isset($_SESSION['authorized'])) {
    	$message = "authorized";
    } else {
    	$message = "error";
    }

	file_put_contents($log_file, "$message: $email\n", FILE_APPEND | LOCK_EX);

	echo $message;
?>
