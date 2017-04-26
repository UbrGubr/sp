<?php


/*	$email = 'tomtheteacher@prairieschool.com';

	$config = parse_ini_file('./config.ini');

	//datatbase connection to get teacher session info
	$connect = mysqli_connect("athena.ecs.csus.edu", $config['username'], $config['password'], $config['dbname']);
	//get tid
	$result = mysqli_query($connect, "SELECT tid FROM teacher WHERE email='".$email."'");
*/
//	session_save_path("./session_vars");
	session_start();

	$_SESSION['authorized'] = true;
	//store tid value as session data
//	$_SESSION['tid'] = $result;

	if(isset($_SESSION['authorized'])) {
		echo "authorized";
	} else {
		echo "error";
	} 

?>