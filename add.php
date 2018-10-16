<?php
include('dbconnect.php');
// print_r($_POST);
$data = $_POST['data'];
$period = $_POST['period'];



$sql = "INSERT INTO dane (`data`, `period` ) VALUES ('".$data."','".$period."')";
if(mysqli_query($conn, $sql)) {
    echo 'succes';
    
} else {
    echo 'error'. mysqli_error($conn);
}
mysqli_close($conn);

?>
   

