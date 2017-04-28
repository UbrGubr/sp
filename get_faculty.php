<?php
//database settings
$config = parse_ini_file('./config.ini');

$connect = mysqli_connect("athena.ecs.csus.edu", $config['username'], $config['password'], $config['dbname']);

$result = mysqli_query($connect, "SELECT * FROM teacher");

$data = array();

while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;
}
    print json_encode($data);
?>
