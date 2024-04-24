<?php 
include ("dbconnect.php");
include 'cbssession.php';
if(!session_id())
{
    session_start();
}
include 'headerstaff.php';


//get booing from the URL

if(isset($_GET['id']))
{
    $bid = $_GET['id'];

}





//Retrieve new bookings
$sql = "SELECT * FROM tb_booking 
        LEFT JOIN tb_vehicle ON tb_booking.b_vehicle = tb_vehicle.vh_registration
        JOIN tb_status ON tb_booking.b_status = tb_status.s_id
        LEFT JOIN tb_users ON tb_booking.b_customer = tb_users.u_id
        WHERE b_id='$bid'";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);

?>

<div class="container">
<br><h3>Booking Details</h3>

<form class="form-horizontal" method="POST" action="staff.php">

    <table class="table table-hover">
        <tr>
            <td>Booking ID</td>
            <td><?php echo $bid;?></td>
        </tr>
        <tr>
            <td>Name</td>
            <td><?php echo $row['u_name'];?></td>
        </tr>
        <tr>
            <td>Contact</td>
            <td><?php echo $row['u_phone'];?></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><?php echo $row['u_address'];?></td>
        </tr>
        <tr>
            <td>Vehicle</td>
            <td><?php echo $row['vh_model'];?></td>
        </tr>
        <tr>
            <td>Pickup Date</td>
            <td><?php echo $row['b_pickupdate'];?></td>
        </tr>
        <tr>
            <td>Return Date</td>
            <td><?php echo $row['b_returndate'];?></td>
        </tr>
        <tr>
            <td>Total Price</td>
            <td><?php echo $row['b_totalprice'];?></td>
        </tr>
        <tr>
            <td>Approval</td>
            <td><?php echo $row['s_desc'];?></td>
        </tr>
    </table>
    <br>


    <button type="submit" class="btn btn-primary">Back to Customer Main Page</button>

</form>
<br><br>

</div>

<?php include 'footer.php'; ?>