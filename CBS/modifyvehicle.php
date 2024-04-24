<?php 
include ("dbconnect.php");
include 'cbssession.php';
if(!session_id())
{
    session_start();
}
include 'headerstaff.php';


//Get vehicle registration
if(isset($_GET['id']))
{
    $vhreg = $_GET['id'];

}

//Retrieve new bookings
$sql = "SELECT * FROM tb_vehicle
        WHERE vh_registration = '$vhreg'";
$result = mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);

?>

<div class="container">
<br>
<form method="POST" action="modifyvehicleprocess.php" enctype="multipart/form-data">
  <fieldset>
    <legend>Modify Car, <?php echo $row['vh_registration'] ?></legend>

    <fieldset>
    <div class="form-group">
      <label for="exampleInputPassword1">Car Type</label>
      <input type="text" name="vhtype" class="form-control" id="exampleInputPassword1" placeholder="<?php echo $row['vh_type'] ?>">
    </div>
    </fieldset>
   
    <fieldset>
    <div class="form-group">
      <label for="exampleTextarea" class="form-label mt-4">Car Model</label>
      <input type="text" name="vhmodel" class="form-control" id="exampleInputPassword1" placeholder="<?php echo $row['vh_model'] ?>">
    </div>
    </fieldset>
    
    <fieldset>
    <div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">Car Year</label>
      <input type="text" name="vhyear" class="form-control" id="exampleInputPassword1" placeholder="<?php echo $row['vh_year'] ?>">
    </div>
    </fieldset>

    <fieldset>
    <div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">Car Price</label>
      <input type="text" name="vhprice" class="form-control" id="exampleInputPassword1" placeholder="<?php echo $row['vh_price'] ?>">
    </div>
    </fieldset>

    <fieldset>
    <div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">Car Media</label>
      <input type="file" class="form-control" name="vhmedia" id="vhmedia">
      <br>
      <input type="hidden" name="vhreg" value="<?php echo $row['vh_registration'] ?>">
      <button type="reset" class="btn btn-warning">Clear</button>
      <input type="submit" name="submit" value="Submit" class="btn btn-primary">
    
    
    <br><br><br>
    </div>
    </fieldset>

  </fieldset>
</form>

</div>

<script>
    window.onload = function(){
        var error = "<?php echo $_GET['error']; ?>";
        if(error){
            alert(error);
        }
    }
</script>

<?php include 'footer.php'; ?>