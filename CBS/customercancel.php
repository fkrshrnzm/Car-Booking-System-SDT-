<?php
include ("dbconnect.php");

include 'cbssession.php';
if(!session_id())
{
    session_start();
}
include 'headercustomer.php';


//get booing from the URL

if(isset($_GET['id']))
{
    $bid = $_GET['id'];

}

//SQL Delete
$sql = "DELETE FROM tb_booking WHERE b_id ='$bid'";
$result = mysqli_query($con, $sql);
mysqli_close($con);

header('location: customermanage.php');


?>

