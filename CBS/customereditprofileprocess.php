<?php
include("dbconnect.php");
include 'cbssession.php';
if(!session_id())
{
    session_start();
}



$uid = $_SESSION['uid'];
$fic = $_POST['fic'];
$fadd = $_POST['fadd'];
$fname = $_POST['fname'];
$femail = $_POST['femail'];
$fcontact = $_POST['fcontact'];
$flic = $_POST['flic'];

$sql = "SELECT * FROM tb_users
        JOIN tb_booking ON tb_users.u_id = tb_booking.b_customer";

$result = mysqli_query($con,$sql);

if ($fic != NULL) {
    $query_update_booking = "UPDATE tb_booking SET b_customer = '$fic' WHERE b_customer = '$uid'";
    mysqli_query($con, $query_update_booking);
    $query1 = "UPDATE tb_users SET u_id = '$fic' WHERE u_id = '$uid'";
    $result = mysqli_query($con, $query1);
}

/*if ($fic != NULL) {
    $query1 = "UPDATE tb_users SET u_id = '$fic' WHERE u_id = '$uid'";
    $result = mysqli_query($con, $query1);
}*/
if ($fadd != NULL) {
    $query2 = "UPDATE tb_users SET u_address = '$fadd' WHERE u_id = '$uid'";
    $result = mysqli_query($con, $query2);
}
if ($fname != NULL) {
    $query3 = "UPDATE tb_users SET u_name = '$fname' WHERE u_id = '$uid'";
    $result = mysqli_query($con, $query3);
}
if ($femail != NULL) {
    $query4 = "UPDATE tb_users SET u_email = '$femail' WHERE u_id = '$uid'";
    $result = mysqli_query($con, $query4);
}
if ($fcontact != NULL) {
    $query5 = "UPDATE tb_users SET u_phone = '$fcontact' WHERE u_id = '$uid'";
    $result = mysqli_query($con, $query5);
}
if ($flic != NULL) {
    $query5 = "UPDATE tb_users SET u_license = '$flic' WHERE u_id = '$uid'";
    $result = mysqli_query($con, $query5);
}


header('location: customerprofile.php');
?>