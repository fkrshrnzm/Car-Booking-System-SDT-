<?php 
include ("dbconnect.php");
include 'cbssession.php';
if(!session_id())
{
    session_start();
}
include 'headerstaff.php';


//Retrieve new bookings
$sql = "SELECT * FROM tb_booking 
        LEFT JOIN tb_vehicle ON tb_booking.b_vehicle = tb_vehicle.vh_registration
        LEFT JOIN tb_status ON tb_booking.b_status = tb_status.s_id
        LEFT JOIN tb_users ON tb_booking.b_customer = tb_users.u_id
        WHERE b_status!='1'";
$result = mysqli_query($con,$sql);


$sql1 = "SELECT * FROM tb_booking 
        LEFT JOIN tb_vehicle ON tb_booking.b_vehicle = tb_vehicle.vh_registration
        LEFT JOIN tb_status ON tb_booking.b_status = tb_status.s_id
        LEFT JOIN tb_users ON tb_booking.b_customer = tb_users.u_id
        WHERE b_status='1'";
$result1 = mysqli_query($con,$sql1);

?>

<div class="container">
<br><h3>Received Booking List</h3>
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

while($row1=mysqli_fetch_array($result1))
{
    echo '<tr>';
    echo "<td>".$row1['b_id']."</td>";
    echo "<td>".$row1['u_name']."</td>";
    echo "<td>".$row1['vh_model']."</td>";
    echo "<td>".$row1['b_pickupdate']."</td>";
    echo "<td>".$row1['b_returndate']."</td>";
    echo "<td>".$row1['b_totalprice']."</td>";
    echo "<td>".$row1['s_desc']."</td>";
    echo "<td>";
      echo "<a href='staffapproval.php?id=".$row1['b_id']."' class='btn btn-warning'>Approval</a>";
    echo "</td>";
    echo '</tr>';
}

?>

</tbody>
</table>
<br>


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
      echo "<a href='staffchange.php?id=".$row['b_id']."' class='btn btn-warning'>Change</a>";
    echo "</td>";
    echo '</tr>';
}

?>

    </tbody>
</table>


</div>
<br><br>
<?php include 'footer.php'; ?>