<?php

include ("dbconnect.php");

include 'cbssession.php';

if (!session_id())
{
    session_start();
}



$uid = $_SESSION['uid'];
$fvec = $_POST['fvec'];
$fpdate = $_POST['fpdate'];
$frdate = $_POST['frdate'];

$pickup_date = strtotime($_POST['fpdate']);
$return_date = strtotime($_POST['frdate']);
if ($return_date < $pickup_date) {
    echo "<script>
        window.location.href='customer.php';
        alert('Return date cannot be earlier than pickup date!');
        </script>";
} else {
    // process booking
    //Calculate number of days 
    $pickup = date('Y-m-d H:i:s', strtotime($fpdate));
    $return = date('Y-m-d H:i:s', strtotime($frdate));
    $daydiff = abs(strtotime($frdate)-strtotime($fpdate));
    $daynum = $daydiff/(60*60*24);

    //Retrieve price from DB
    $sqlprice = "SELECT vh_price FROM tb_vehicle WHERE vh_registration='$fvec'";
    $resultprice = mysqli_query($con, $sqlprice);
    $rowprice = mysqli_fetch_array($resultprice);

    //Calculate total price
    $totalprice = $daynum*($rowprice['vh_price']);

    $sql = "INSERT INTO tb_booking(b_customer, b_vehicle, b_pickupdate, b_returndate, b_totalprice, b_status)
            VALUES ('$uid', '$fvec', '$fpdate', '$frdate', '$totalprice', '1')";

    mysqli_query($con,$sql);
    mysqli_close($con);


    //Successful notification or redirect
    echo "<script>
    window.location.href='customermanage.php';
    alert('Your booking has been recorded successfully.');
    </script>";
    //header('location:customermanage.php');
        
}


/*
//Calculate number of days 
$pickup = date('Y-m-d H:i:s', strtotime($fpdate));
$return = date('Y-m-d H:i:s', strtotime($frdate));
$daydiff = abs(strtotime($frdate)-strtotime($fpdate));
$daynum = $daydiff/(60*60*24);

//Retrieve price from DB
$sqlprice = "SELECT vh_price FROM tb_vehicle WHERE vh_registration='$fvec'";
$resultprice = mysqli_query($con, $sqlprice);
$rowprice = mysqli_fetch_array($resultprice);

//Calculate total price
$totalprice = $daynum*($rowprice['vh_price']);

$sql = "INSERT INTO tb_booking(b_customer, b_vehicle, b_pickupdate, b_returndate, b_totalprice, b_status)
        VALUES ('$uid', '$fvec', '$fpdate', '$frdate', '$totalprice', '1')";

mysqli_query($con,$sql);
mysqli_close($con);


//Successful notification or redirect
header('location:customermanage.php');
include 'headermain.php';
*/

?>

<?php
include 'headermain.php';
include 'footer.php';

?>