<?php
include 'cbssession.php';
if(!session_id())
{
    session_start();
}

include("dbconnect.php");

//retrieve data from approval page
$fstatus = $_POST['fstatus'];
$fbid = $_POST['fbid'];

$sql= "UPDATE tb_booking
       SET b_status='$fstatus'
       WHERE b_id='$fbid'";
var_dump($sql);
mysqli_query($con,$sql);

/*
$sql1= "SELECT * FROM tb_booking 
        JOIN tb_status ON tb_booking.b_status = tb_status.s_id
        JOIN tb_users ON tb_booking.b_customer = tb_users.u_id
        WHERE b_id = $fbid";
$result1 = mysqli_query($con,$sql1);
$row = mysqli_fetch_array($result1);




function sanitize_my_email($field) {
    $field = filter_var($field, FILTER_SANITIZE_EMAIL);
    if (filter_var($field, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

$to_email = $row['u_email'];
$subject = 'Your Booking Status';
$message = 'Dear '.$row['u_name'].', your booking ID, '.$row['b_id'].' has been '.$row['s_desc'];
$headers = 'From: fikri02@graduate.utm.my';
//check if the email address is invalid $secure_check
$secure_check = sanitize_my_email($to_email);
if ($secure_check == false) {
    echo "Invalid input";
} else { //send email 
    if (mail($to_email, $subject, $message, $headers)) {
        echo "KarHub";
        header('location: staffview.php');
    } else {
        echo "ERROR";
    }
}
*/
mysqli_close($con);

header('Location:staff.php');



?>