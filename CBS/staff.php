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
        WHERE b_status='1'";
$result = mysqli_query($con,$sql);

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
      echo "<a href='staffapproval.php?id=".$row['b_id']."' class='btn btn-warning'>Approval</a>";
    echo "</td>";
    echo '</tr>';
}

?>

</tbody>
</table>

<br>
<div class="card mb-5">
  <h3 class="card-header">Car Inventory</h3>
  

  <?php

  $sql1 = "SELECT * FROM tb_vehicle";
  $result1 = mysqli_query($con,$sql1);
  while ($row = mysqli_fetch_array($result1)) {
    
    echo'<img src="media/' . $row['vh_media'] . '" class="d-block user-select-none" width="30%" height="100%" focusable="false" role="img" preserveAspectRatio="xMidYMid slice" viewBox="0 0 318 180" style="font-size:1.125rem;text-anchor:middle; margin-left:auto; margin-right:auto">';
    echo'<rect width="100%" height="100%" fill="#868e96"></rect>';


    echo '<ul class="list-group list-group-flush">';
    echo '<li class="list-group-item">' . 'Model: ' . $row['vh_model'] . '</li>';
    echo '<li class="list-group-item">' . 'Registration Number: ' . $row['vh_registration'] . '</li>';
    echo '<li class="list-group-item">' . 'Year: ' . $row['vh_year'] . '</li>';
    echo '<li class="list-group-item">' . 'Price: RM ' . $row['vh_price'] . '</li>';
    echo '</ul>';
  }

  ?>


</div>
<br>

 


</div>

<?php include 'footer.php'; ?>