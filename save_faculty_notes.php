<?php
//database settings
$config = parse_ini_file('./config.ini');
$connection = mysqli_connect("athena.ecs.csus.edu", $config['username'], $config['password'], $config['dbname']);

$date = date('Y,m,d');

echo $date;

//insert note data into db
mysqli_query($connection, "INSERT INTO notes (ndate, note, tid) VALUES (".$date.", 'test', 1111111)");


?>