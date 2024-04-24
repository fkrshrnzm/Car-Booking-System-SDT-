<?php 
include ("dbconnect.php");

include 'cbssession.php';
if(!session_id())
{
    session_start();
}
include 'headercustomer.php';


$uid = $_SESSION['uid'];
$bid = $_POST['bid'];

//Retrieve new bookings
$sql = "SELECT * FROM tb_booking
        JOIN tb_vehicle ON tb_booking.b_vehicle = tb_vehicle.vh_registration
        JOIN tb_status ON tb_booking.b_status = tb_status.s_id
        JOIN tb_users ON tb_booking.b_customer = tb_users.u_id 
        WHERE b_id='$bid' AND tb_users.u_id='$uid'";
$result = mysqli_query($con,$sql);

?>

<div class="container">
<br><h3>Booking List</h3>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Booking ID</th>
      <th scope="col">Customer</th>
      <th scope="col">Vehicle</th>
      <th scope="col">Pick-up Date</th>
      <th scope="col">Return Date</th>
      <th scope="col">Total Price</th>
      <th scope="col">Status</th>
      <th scope="col">Operation</th>
    </tr>
  </thead>
  <tbody>

<?php

while($row=mysqli_fetch_array($result))
{
    echo '<tr>';
    echo "<td>".$row['b_id']."</td>";
    echo "<td>".$row['u_name']."</td>";
    echo "<td>".$row['vh_model']."</td>";
    echo "<td>".$row['b_pickupdate']."</td>";
    echo "<td>".$row['b_returndate']."</td>";
    echo "<td>".$row['b_totalprice']."</td>";
    echo "<td>".$row['s_desc']."</td>";
    echo "<td>";
      echo "<a href='customerviewbooking2.php?id=".$row['b_id']."' class='btn btn-primary'>View</a>";
    echo "</td>";
    echo '</tr>';
}

?>

    </tbody>
</table>


</div>

<?php include 'footer.php'; ?>