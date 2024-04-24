<?php 
include 'dbconnect.php';

include 'cbssession.php';
if (!session_id())
{
	session_start();
}

include 'headercustomer.php';


//get booking ID from URL
if(isset($_GET['id']))
{
	$bid = $_GET['id'];
}

$sql="SELECT * FROM tb_booking WHERE b_id = '$bid'";
$result=mysqli_query($con, $sql);
$row=mysqli_fetch_array($result); 

$sql1 = "SELECT * FROM tb_vehicle";
$result = mysqli_query($con,$sql1);

?>

<div class="container">

<div class="row">
    <div class="col-sm-6">
    <br><br>
	<legend>Car List</legend>
	<br>
    
	<?php

    while ($row1 = mysqli_fetch_array($result)) {
      echo '<div class="row">';
      echo '<div class="col-sm-6"><img class="img-thumbnail" id="vhmedia" src="media/'.$row1['vh_media'].'"></div>';
      echo '<div class="col-sm-6">' . $row1['vh_model'] . '<br>' . $row1['vh_year'] . '<br>' . "RM " . $row1['vh_price'] . '</div>';
      echo '</div>';
    }
    ?>

    </div>

  <div class="col-sm-6"><br><br>

		<form method="post" action="customermodifyprocess.php">
		  <fieldset>
		    <legend>Modify Form</legend>

		    <label for="exampleSelect1">Booking ID: <?php echo $bid ; ?></label>
		    <br><br>

		    <div class="form-group">
		      <label for="exampleSelect1">Select Vehicle</label>
					<?php
						$sqlv = "SELECT * FROM tb_vehicle";
						$resultv = mysqli_query($con, $sqlv);

						echo '<select class="form-select" name="fvec" id="exampleSelect1">';
						while($rowv = mysqli_fetch_array($resultv))
							{

								if($rowv['vh_registration'] == $row['b_vehicle'])
								{
									echo"<option selected = 'selected' value = '".$rowv['vh_registration']."'>".$rowv['vh_model']."</option>";
								}
								else
								{
									echo"<option value = '".$rowv['vh_registration']."'>".$rowv['vh_model']."</option>";
								}
								
							}
						echo '</select>';
					?>

		    </div>

		    <div class="form-group">
		      <label for="exampleInputPassword1" class="form-label mt-4">Pickup Date</label>
		      <input type="date" name="fpdate" class="form-control" id="exampleInputPassword1" value="<?php echo $row['b_pickupdate'] ?>" required>
		    </div>

		    <div class="form-group">
		      <label for="exampleInputPassword1" class="form-label mt-4">Return Date</label>
		      <input type="date" name="frdate"class="form-control" id="exampleInputPassword1" value="<?php echo $row['b_returndate'] ?>" required>
		    </div>

		    <input type="hidden" name="fbid" value="<?php echo $row['b_id'] ?>" required>

		    <br><button type="reset" class="btn btn-secondary">Clear Form</button>
		    <button  type="submit" class="btn btn-outline-success">Modify</button>
		    
		  </fieldset>
		</form>

  <br></div>
</div>

</div>
<br><br>
<?php include 'footer.php';?>