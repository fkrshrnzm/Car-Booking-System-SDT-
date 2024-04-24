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

<script>
        function confirmDelete() {
          if (confirm("Are you sure you want to delete the car?")) {
            window.location.href = "deletevehicleprocess.php";
          }
        }
</script>

<div class="container">
<br>
<form method="POST" action="deletevehicleprocess.php" enctype="multipart/form-data">
  <fieldset>
    <legend>Delete Car, <?php echo $row['vh_model'] ?></legend>

    <fieldset>
    <div class="form-group">
      <label for="exampleInputPassword1">Car Registration Number</label>
      <output class="form-control" name="vhreg"><?php echo $row['vh_registration'] ?></output>
      <br>
    </div>
    </fieldset>

    <fieldset>
    <div class="form-group">
      <label for="exampleInputPassword1">Car Type</label>
      <output class="form-control" name="vhtype"><?php echo $row['vh_type'] ?></output>
    </div>
    </fieldset>
   
    <fieldset>
    <div class="form-group">
      <label for="exampleTextarea" class="form-label mt-4">Car Model</label>
      <output class="form-control" name="vhmodel"><?php echo $row['vh_model'] ?></output>
    </div>
    </fieldset>
    
    <fieldset>
    <div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">Car Year</label>
      <output class="form-control" name="vhyear"><?php echo $row['vh_year'] ?></output>
    </div>
    </fieldset>

    <fieldset>
    <div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">Car Price</label>
      <output class="form-control" name="vhprice"><?php echo $row['vh_price'] ?></output>
    </div>
    </fieldset>

    <fieldset>
    <div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">Car Media</label>
      <output class="form-control" name="vhmedia"><?php echo $row['vh_media'] ?></output>
      <br>
      <input type="hidden" name="vhreg" value="<?php echo $row['vh_registration'] ?>">
      <input type="submit" name="submit" value="Delete" class="btn btn-primary" onclick="confirmDelete()">
    
    
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
