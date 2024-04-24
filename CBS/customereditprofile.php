<?php 
include ('dbconnect.php');
include 'cbssession.php';
if(!session_id())
{
    session_start();
}

include 'headercustomer.php';

$uid = $_SESSION['uid'];

$sql = "SELECT * FROM tb_users 
        WHERE u_id='$uid'";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);

?>

<div class="container">
<br>
<form method="POST" action="customereditprofileprocess.php">
  <fieldset>
    <legend>Hi, <?php echo $row['u_name']  ?></legend>
    <?php

    echo'<div class="form-group">';
        echo'<label for="exampleInputPassword1" class="form-label mt-4">Full Name</label>';
        echo'<input type="text" class="form-control" name="fname" placeholder="'.$row['u_name'].'">';
    echo'</div>';

    echo'<div class="form-group">';
      echo'<label for="exampleTextarea" class="form-label mt-4">Address</label>';
      echo'<textarea class="form-control" name="fadd" rows="3" placeholder="'.$row['u_address'].'"></textarea>';
    echo'</div>';

    echo'<div class="form-group">';
      echo'<label for="exampleInputPassword1" class="form-label mt-4">Email</label>';
      echo'<input type="email" class="form-control" name="femail" placeholder="'.$row['u_email'].'">';
    echo'</div>';

    echo'<div class="form-group">';
      echo'<label for="exampleInputPassword1" class="form-label mt-4">Contact Number</label>';
      echo'<input type="text" class="form-control" name="fcontact" placeholder="'.$row['u_phone'].'">';
    echo'</div>';

    echo'<div class="form-group">';
      echo'<label for="exampleInputPassword1" class="form-label mt-4">License No.</label>';
      echo'<input type="text" class="form-control" name="flic" placeholder="'.$row['u_license'].'">';
    echo'</div>';
    
    ?>

    <br>
    <button type="reset" class="btn btn-warning">Clear</button><button type="submit" class="btn btn-primary">Submit</button>
    <br><br><br>

  </fieldset>
</form>

</div>

<?php include 'footer.php'; ?>