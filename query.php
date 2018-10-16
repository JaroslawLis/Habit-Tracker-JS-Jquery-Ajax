<?php
include('dbconnect.php');

$sql="select extract(year_month from data) as mc, avg(period) as avg, sum(period) as sum, sum(period)/DAY(LAST_DAY(data)) as avg2 from dane group by mc";

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
