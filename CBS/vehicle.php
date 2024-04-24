<?php 
include ("dbconnect.php");
include 'cbssession.php';
if(!session_id())
{
    session_start();
}
include 'headerstaff.php';


//Retrieve new bookings
$sql = "SELECT * FROM tb_vehicle";
$result = mysqli_query($con,$sql);

?>

<div class="container">
<br><h3>Car List</h3>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Vehicle</th>
      <th scope="col">Vehicle Registration Number</th>
      <th scope="col">Vehicle Type</th>
      <th scope="col">Vehicle Model</th>
      <th scope="col">Vehicle Year</th>
      <th scope="col">Price</th>
      <th scope="col">Operation</th>
    </tr>
  </thead>
  <tbody>

<?php

while($row=mysqli_fetch_array($result))
{
    echo '<tr>';
    echo "<td class='img-thumbnail'><img style='width: 120px' id='vhmedia' src='media/".$row['vh_media']."'></td>";

    //echo "<td class='img-thumbnail'><img style='width: 120px' src='data:image/jpeg;base64,".base64_encode($row['vh_media'])."'></td>";
    echo "<td>".$row['vh_registration']."</td>";
    echo "<td>".$row['vh_type']."</td>";
    echo "<td>".$row['vh_model']."</td>";
    echo "<td>".$row['vh_year']."</td>";
    echo "<td>"."RM".$row['vh_price']."</td>";
    echo "<td>";
      echo "<a href='modifyvehicle.php?id=".$row['vh_registration']."' class='btn btn-primary'>Modify</a>";
      echo "<a href='deletevehicle.php?id=".$row['vh_registration']."' class='btn btn-danger'>Delete</a>";
    echo "</td>";
    echo '</tr>';
}

?>

    </tbody>
</table>
<a href='addvehicle.php' class='btn btn-success'>Add New Vehicle</a>
<br><br><br>

</div>

<?php include 'footer.php'; ?>