<?php
include('dbconnect.php');

/* $sql1="select extract(year_month from data) as mc, avg(period) as avg, sum(period) as sum, sum(period)/DAY(LAST_DAY(data)) as avg2 from dane group by mc";
$sql2=" SELECT avg(period) as avg, sum(period)/30 as avg2  FROM dane WHERE data BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW()"; */
$sql=" SELECT ceil(avg(period)) as avg, ceil(sum(period)/30) as avg2,  COUNT(1) as il_lekcji  FROM dane WHERE data BETWEEN DATE_SUB((NOW() -INTERVAL 1 DAY), INTERVAL 30 DAY) AND (NOW()-INTERVAL 1 DAY)";
$sql_stary_dobry=" SELECT ceil(avg(period)) as avg, ceil(sum(period)/30) as avg2,  COUNT(1) as il_lekcji  FROM dane WHERE data BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW()";





$result = mysqli_query($conn, $sql) or die ("error" . mysqli_error($conn));



$myTasks = array();

while($row = mysqli_fetch_assoc($result)) {

    $myTasks[] = $row;
}
mysqli_close($conn);
echo '<p>Średnia dni nauki</p>';
echo '<p>'.sprintf("%02d:%02d", floor($myTasks['0']['avg']/60), $myTasks['0']['avg']%60).'</p>';
echo '<p>Średnia ostatnich 30 dni</p>';
echo '<p>'.sprintf("%02d:%02d", floor($myTasks['0']['avg2']/60), $myTasks['0']['avg2']%60).'</p>';
echo '<p>Ilość dni nauki</p>';
echo '<p>'.($myTasks['0']['il_lekcji']).'</p>';

?>
