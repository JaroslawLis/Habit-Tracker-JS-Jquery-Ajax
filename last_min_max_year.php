<?php
include_once('dbconnect.php');

$sql= "SELECT MAX(period)as MaxFrom30, MIN(period)as MinFrom30 FROM (SELECT
data, period FROM dane ORDER by data DESC LIMIT 365) as thirty";
$result = mysqli_query($conn, $sql) or die ("error" . mysqli_error($conn));

$minMax = array();
while($row = mysqli_fetch_assoc($result)) {
    $minMax[] = $row;
}
mysqli_close($conn);
echo '<h4>Min Max - ostatni rok</h4>';
echo '<h5>Minimum</h5>';
 //  print_r($minMax);
// echo $minMax['0']['MinFrom30'];
$t = $minMax['0']['MinFrom30'];

echo '<p>'.sprintf("%02d:%02d", floor($t/60), $t%60).'</p>';
$t = $minMax['0']['MaxFrom30'];
echo '<h5>Maximum</h5>';
echo '<p>'.sprintf("%02d:%02d", floor($t/60), $t%60).'</p>';
?>