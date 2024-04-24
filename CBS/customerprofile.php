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
<form method="POST" action="customereditprofile.php">
  <fieldset>
    <legend>Hi, <?php echo $row['u_name']  ?></legend>
    
    <div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">IC Number</label>
      <output class="form-control" name="fic"><?php echo $row['u_id'] ?></output>
    </div>
    
    <div class="form-group">
      <label for="exampleTextarea" class="form-label mt-4">Address</label>
      <output class="form-control" name="fadd"><?php echo $row['u_address'] ?></output>
    </div>
    
    <div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">Full Name</label>
      <output class="form-control" name="fname"><?php echo $row['u_name'] ?></output>
    </div>

    <div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">Email</label>
      <output class="form-control" name="femail"><?php echo $row['u_email'] ?></output>
    </div>
    
    <div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">Contact Number</label>
      <output class="form-control" name="fcontact"><?php echo $row['u_phone'] ?></output>
    </div>
   
    <div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">License No.</label>
      <output class="form-control" name="flic"><?php echo $row['u_license'] ?></output>
    </div>
    
    <br>
    <button type="submit" class="btn btn-success">Edit Profile</button>
    <?php
    echo '<a href="changepassword.php?id='.$row['u_id'].'" class="btn btn-success">Change Password</a>';
    ?>
    
  </fieldset>
</form>

<br><br><br>
</div>

<?php include 'footer.php'; ?>