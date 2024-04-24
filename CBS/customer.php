<?php 
include ('dbconnect.php'); 
include 'cbssession.php';
if(!session_id())
{
    session_start();
}

include 'headercustomer.php';


$sql = "SELECT * FROM tb_vehicle";
$result = mysqli_query($con,$sql);

?>

<div class="container">

<div class="row">
    <div class="col-sm-6">
    <br><br>
	  <legend>Car List</legend>
	  <br>

    <?php

    while ($row = mysqli_fetch_array($result)) {
      echo '<div class="row">';
      echo '<div class="col-sm-6"><img class="img-thumbnail" id="vhmedia" src="media/'.$row['vh_media'].'"></div>';
      echo '<div class="col-sm-6">' . $row['vh_model'] . '<br>' . $row['vh_registration'] . '<br>' . $row['vh_year'] . '<br>' . "RM " . $row['vh_price'] . '</div>';
      echo '</div>';
    }

    echo '<br>';
    echo '<br>';
    ?>

    </div>

    <div class="col-sm-6">
    <br><br>
    <form method="POST" action="customerprocess.php">
    <fieldset>
    <legend>Booking Form</legend>

    <div class="form-group">
      <label for="exampleSelect1" class="form-label mt-4">Select your preferred vehicle</label>

      <?php
			      	$sql = "SELECT * FROM tb_vehicle";
			      	$result = mysqli_query($con,$sql);

			      	echo '<select class="form-select" name="fvec" id="exampleSelect1">';
			      		while($row = mysqli_fetch_array($result))
			      		{
			      			echo"<option value = '".$row['vh_registration']."'>".$row['vh_model']." " .$row['vh_registration']."</option>";
			      		}
			      	echo '</select>';

			?> 

      
    </div>
    
    <div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">Pick up Date</label>
      <input type="date" class="form-control" name="fpdate" id="exampleInputPassword1" placeholder="dd/mm/yyyy" required>
      <br>
    </div>

    <div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">Return Date</label>
      <input type="date" class="form-control" name="frdate" id="exampleInputPassword1" placeholder="dd/mm/yyyy" required>
      <br>
    </div>
    
    
    
    <br>
    <button type="reset" class="btn btn-warning">Clear</button><button type="submit" class="btn btn-primary">Submit</button>
    <br><br><br>

  </fieldset>
</form>

    </div>
  
</div>
</div>

<?php include 'footer.php'; ?>