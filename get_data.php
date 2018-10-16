<?php
include('dbconnect.php');
$sql1 = "select * from dane";
$sql= "SELECT * FROM ( SELECT * FROM dane ORDER BY id DESC LIMIT 14 ) sub ORDER BY id ASC";
$result = mysqli_query($conn, $sql) or die ("error" . mysqli_error($conn));

$myTasks = array();
while($row = mysqli_fetch_assoc($result)) {
    $myTasks[] = $row;
}
mysqli_close($conn);
header('Content-Type: application/json');
$json = json_encode($myTasks);
echo $json;
?>
