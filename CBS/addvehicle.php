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
<br>
<form method="POST" action="addvehicleprocess.php" enctype="multipart/form-data">
  <fieldset>
    <legend>Add New Car</legend>
    
    <fieldset>
    <div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">Car Registration Number</label>
      <input type="text" class="form-control" name="vhreg" id="exampleInputPassword1" placeholder="xxxxxxx" required>
      <br>
    </div>
    </fieldset>

    <fieldset>
    <div class="form-group">
      <label for="exampleInputPassword1">Car Type</label>
      <input type="text" class="form-control" name="vhtype" id="exampleInputPassword1" placeholder="Sedan/SUV/Muscle Car or etc." required>
    </div>
    </fieldset>
   
    <fieldset>
    <div class="form-group">
      <label for="exampleTextarea" class="form-label mt-4">Car Model</label>
      <input type="text" class="form-control" name="vhmodel" id="exampleInputPassword1" placeholder="Model" required>
    </div>
    </fieldset>
    
    <fieldset>
    <div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">Car Year</label>
      <input type="text" class="form-control" name="vhyear" id="exampleInputPassword1" placeholder="xxxx" required>
    </div>
    </fieldset>

    <fieldset>
    <div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">Car Price</label>
      <input type="text" class="form-control" name="vhprice" id="exampleInputPassword1" placeholder="xxx.xx" required>
    </div>
    </fieldset>

    <fieldset>
    <div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">Car Media</label>
      <input type="file" class="form-control" name="vhmedia" id="vhmedia" required>
      <br>
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