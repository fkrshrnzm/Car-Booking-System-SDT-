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
<form method="POST" action="changepasswordprocess.php">
  <fieldset>
    <legend>Hi, <?php echo $row['u_name']  ?></legend>
    <?php

    echo'<div class="form-group">';
        echo'<label for="exampleInputPassword1" class="form-label mt-4">Change Password</label>';
        echo'<input type="password" class="form-control" name="fpwd" placeholder="Password" required>';
    echo'</div>';

    echo'<div class="form-group">';
        echo'<label for="exampleInputPassword1" class="form-label mt-4">Confirm New Password</label>';
        echo'<input type="password" class="form-control" name="cfpwd" placeholder="Rewrite the Password" required>';
    echo'</div>';

    
    ?>

    <br>
    <button type="reset" class="btn btn-warning">Clear</button><button type="submit" class="btn btn-primary">Submit</button>
    <br><br><br>

  </fieldset>
</form>

</div>

<?php include 'footer.php'; ?>