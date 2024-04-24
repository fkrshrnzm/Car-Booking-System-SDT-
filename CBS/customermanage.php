<?php 
include ("dbconnect.php");
include 'cbssession.php';
if(!session_id())
{
    session_start();
}
include 'headercustomer.php';


$uid = $_SESSION['uid'];

//Retrieve individual bookings
$sql = "SELECT * FROM tb_booking 
        LEFT JOIN tb_vehicle ON tb_booking.b_vehicle = tb_vehicle.vh_registration
        LEFT JOIN tb_status ON tb_booking.b_status = tb_status.s_id
        WHERE b_customer='$uid'";
$result = mysqli_query($con,$sql);

?>

<div class="container">
<br><h3>Your Booking List</h3>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Booking ID</th>
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
    echo "<td>".$row['vh_model']."</td>";
    echo "<td>".$row['b_pickupdate']."</td>";
    echo "<td>".$row['b_returndate']."</td>";
    echo "<td>".$row['b_totalprice']."</td>";
    echo "<td>".$row['s_desc']."</td>";
    echo "<td>";
      echo "<a href='customermodify.php?id=".$row['b_id']."' class='btn btn-warning'>Modify</a>";
      echo "<a href='customercancel.php?id=".$row['b_id']."' class='btn btn-danger' onclick='confirmLogout()'>Cancel</a>";

    echo "</td>";
    echo '</tr>';
}


?>

<script>
        function confirmLogout() {
          if (confirm("Are you sure you want to cancel the booking?")) {
          }
        }
        </script>

    </tbody>
</table>


</div>

<?php include 'footer.php'; ?>