<?php

	static $connection;

	if(!isset($connection)) {
         // Load configuration as an array. Use the actual location of your configuration file
        $config = parse_ini_file('./config.ini');
        $connection = mysqli_connect('athena.ecs.csus.edu',$config['username'],$config['password'],$config['dbname']);

		#mysqli_select_db('sp_dev');
    }

	if(isset($_GET['fname']) && !empty($_GET['fname']) AND isset($_GET['mname']) && !empty($_GET['mname']) AND isset($_GET['lname']) && !empty($_GET['lname']) AND isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['idnum']) && !empty($_GET['idnum']))
	{
    	// Verify data
		$email = mysql_escape_string($_GET['email']); // Set email variable
    	$fname = mysql_escape_string($_GET['fname']); // Set fname variable
		$mname = mysql_escape_string($_GET['mname']); // Set mname variable
		$lname = mysql_escape_string($_GET['lname']); // Set lname variable
		$idnum = mysql_escape_string($_GET['idnum']); // Set idnum variable

		$search = mysqli_query($connection,"SELECT tid, fname, mname, lname, email, activated FROM teacher 
				WHERE email='".$email."' AND fname='".$fname."' AND lname='".$mname."' AND lname='".$lname."' AND tid='".$idnum."' AND activated='0'") or die(mysql_error()); 
		#$match  = mysql_num_rows($search);

		mysqli_query($connection,"UPDATE teacher SET activated='1' 
				WHERE email='".$email."' AND fname='".$fname."' AND mname='".$mname."' AND lname='".$lname."' AND tid='".$idnum."' AND activated='0'") or die(mysql_error());
		
		echo '<div class="statusmsg">Your account has been activated, you can now login</div>';
		#echo "number of matches = ".$match;
	}
	else
	{
    	// Invalid approach
		echo "i dieded";
	}

?>
