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
<form method="POST" action="customerviewbooking.php">
  <fieldset>
    <legend>Hi, <?php echo $row['u_name'] ?></legend>
    
    <div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">Enter a booking ID</label>
      <input type="number" class="form-control" name="bid">
    </div>

    <br>
    <button type="submit" class="btn btn-primary">Submit</button>
    <br><br><br>

  </fieldset>
</form>

</div>

<?php include 'footer.php'; ?>