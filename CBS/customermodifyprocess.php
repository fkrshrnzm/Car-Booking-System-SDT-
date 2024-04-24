<?php
include("dbconnect.php");

include 'cbssession.php';
if(!session_id())
{
    session_start();
}



$fic = $_SESSION['uid'];
$fvec = $_POST['fvec'];
$fbid = $_POST['fbid'];
$fpdate = $_POST['fpdate'];
$frdate = $_POST['frdate'];

$pickup_date = strtotime($_POST['fpdate']);
$return_date = strtotime($_POST['frdate']);

if ($return_date < $pickup_date) {
    echo "<script>
        window.location.href='customermanage.php';
        alert('Return date cannot be earlier than pickup date!');
        </script>";
} else {
    //calculate number of days
    $pickup = date('Y-m-d H:i:s', strtotime($fpdate));
    $return = date('Y-m-d H:i:s', strtotime($frdate));
    $daydiff = abs(strtotime($frdate) - strtotime($fpdate)); //or abs($frdate - $fpdate);

    //calculate number days rent
    $daynum = $daydiff/(60*60*24);

    $sqlprice = "SELECT vh_price FROM tb_vehicle WHERE vh_registration = '$fvec'";
    $resultprice = mysqli_query($con, $sqlprice);
    $rowprice = mysqli_fetch_array($resultprice);

    //calculate total price
    $totalprice = $daynum*($rowprice['vh_price']);

    //update(insert) new booking to DB

    $sql =" UPDATE tb_booking 
        SET b_vehicle ='$fvec', b_pickupdate ='$fpdate', b_returndate= '$frdate', b_totalprice = '$totalprice', b_status='1'
        WHERE b_id='$fbid'";

    mysqli_query($con,$sql);
    mysqli_close($con);

    //Successful notification or redirect
    echo "<script>
    window.location.href='customermanage.php';
    alert('Your booking has been updated successfully.');
    </script>";
    //header('location:customermanage.php');
}



?>

