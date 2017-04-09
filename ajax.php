<?php
//database settings
$connect = mysqli_connect("athena.ecs.csus.edu", "sp_dev_user", "sp_dev_db", "sp_dev");

$result = mysqli_query($connect, "select * from student");

$data = array();

while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;
}
    print json_encode($data);
?>
