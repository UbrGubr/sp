<?php

	static $connection;

	if(!isset($connection)) {
         // Load configuration as an array. Use the actual location of your configuration file
        $config = parse_ini_file('./config.ini');
        $connection = mysqli_connect('athena.ecs.csus.edu',$config['username'],$config['password'],$config['dbname']);

		#mysqli_select_db('sp_dev');
    }

	if(isset($_GET['fName']) && !empty($_GET['fName']) AND isset($_GET['lName']) && !empty($_GET['lName']) AND isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['idNum']) && !empty($_GET['idNum']))
	{
    	// Verify data
		$email = mysql_escape_string($_GET['email']); // Set email variable
    	$fName = mysql_escape_string($_GET['fName']); // Set fName variable
		$lName = mysql_escape_string($_GET['lName']); // Set lName variable
		$idNum = mysql_escape_string($_GET['idNum']); // Set idNum variable

		$search = mysqli_query($connection,"SELECT id, email, activated FROM teacher WHERE email='".$email."' AND id='".$idNum."' AND activated='0'") or die(mysql_error()); 
		#$match  = mysql_num_rows($search);

		mysqli_query($connection,"UPDATE teacher SET activated='1' WHERE email='".$email."' AND id='".$idNum."' AND activated='0'") or die(mysql_error());
		echo '<div class="statusmsg">Your account has been activated, you can now login</div>';
		#echo "number of matches = ".$match;
	}
	else
	{
    	// Invalid approach
		echo "i dieded";
	}

?>
