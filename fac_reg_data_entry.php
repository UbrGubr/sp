<?php

    // Define connection as a static variable, to avoid connecting more than once 
    static $connection;

	$fName = $mName = $lName = $idNum = $email = $pw = '';

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

	
			$fName = $_REQUEST['FIRSTNAME'];
			$mName = $_REQUEST['MIDNAME'];
			$lName = $_REQUEST['LASTNAME'];
			$idNum = $_REQUEST['IDNUM'];
			$email = $_REQUEST['EMAIL'];
			$pw = $_REQUEST['PW'];
			
			$fullName = $fName . ' ' . $mName . ' ' . $lName;
			
			//hash password; salt generated automatically
			$encryptedPW = password_hash($pw, PASSWORD_DEFAULT);	
			
		
		/*	
			$fName = 'lisa';
			$mName = 'a';
			$lName = 'solem';
			$idNum = 123;
			$email = "abc@yahoo.com";
			$pw = 12345;
			$month = "may";
			$day = 4;
			$year = 1988;
			
			$fullName = $fName + ' ' + $mName + ' ' + $lName;
		*/
	
	
	
	if(mysqli_query($connection,"INSERT INTO teacher (id, name, track_id, phone, address, auth_hash, email) 
					VALUES ('$idNum', '$fullName', NULL, '', '', '$encryptedPW', '$email')")){
		echo "successful\n";
		
		$config = parse_ini_file('./config.ini'); 
		// Sends a verification email to the admin to request approval for account creation
		$to = $config['admin'];
		$subject = 'Approval required for new account request';
		$message = '
		A new account has been requested. Please review the following user information and either approve or deny their access.

		First Name: '.$fName.'
		Last Name: '.$lName.'
		Email: '.$email.'
		Employee ID: '.$idNum.'
		
		You can approve this request by clicking on the following link:

		http://ecs.csus.edu/~jimisonp/sp/verify.php?fName='.$fName.'&lName='.$lName.'&email='.$email.'&idNum='.$idNum.'

		If you do not recognize this person then no further action is required and their account will not be activated. 
		';
		$headers = 'noreply@seniorproject.com' . "\r\n";
		mail($to, $subject, $message, $headers);	
						
	} else {
		echo "not successful\n";
	}
	
	mysqli_close($connection);

	echo "Complete";

?>
