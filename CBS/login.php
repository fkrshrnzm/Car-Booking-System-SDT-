<?php include 'headermain.php'; ?>

<div class="container">
<br>

<form method="POST" action="loginprocess.php">
  <fieldset>
    <legend>Login Form</legend>
    
    <div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">Please Enter Your IC Number</label>
      <input type="text" class="form-control" name="fic" id="exampleInputPassword1" placeholder="xxxxxx-xx-xxxx" required>
      <br>
    </div>
    
    
    <div class="form-group">
      <label for="exampleInputPassword1">Please Enter Your Password</label>
      <input type="password" class="form-control" name="fpwd" id="exampleInputPassword1" placeholder="Password" required>
    </div>
    
    <br>
    <button type="reset" class="btn btn-warning">Clear</button><button type="submit" class="btn btn-primary">Submit</button>
    <br><br><br>

  </fieldset>
</form>

</div>

<?php include 'footer.php'; ?>