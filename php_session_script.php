<?php

	session_start();

	$_SESSION['authorized'] = true;

	if(isset($_SESSION['authorized'])){
		echo "authorization variable set";
	} else {
		echo "error";
	} 

	//session_destroy();

?>