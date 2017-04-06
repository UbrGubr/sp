<?php
	

session_start();
$_SESSION['authorized'] = false;
session_unset($_SESSION['authorized']);
session_destroy();
echo 'ok';

?>