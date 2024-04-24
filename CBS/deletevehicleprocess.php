<?php

include("dbconnect.php");

$vhreg = $_POST['vhreg'];
//$vhtype = $_POST['vhtype'];
//$vhmodel = $_POST['vhmodel'];
//$vhyear = $_POST['vhyear'];
//$vhprice = $_POST['vhprice'];
//$vhmedia = $_POST['vhmedia'];

$sql = "DELETE FROM tb_vehicle WHERE vh_registration = '$vhreg'";
$result = mysqli_query($con, $sql);
mysqli_close($con);
header("location:vehicle.php");

?>
