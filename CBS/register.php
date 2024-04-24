<?php include 'headermain.php'; ?>

<div class="container">
<br>
<form method="POST" action="registerprocess.php">
  <fieldset>
    <legend>Registration Form</legend>
    
    <div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">IC Number</label>
      <input type="text" class="form-control" name="fic" id="exampleInputPassword1" placeholder="xxxxxx-xx-xxxx" required>
      <br>
    </div>
    
    
    <div class="form-group">
      <label for="exampleInputPassword1">Create Password</label>
      <input type="password" class="form-control" name="fpwd" id="exampleInputPassword1" placeholder="Password" required>
      <br>
    </div>

    <div class="form-group">
      <label for="exampleInputPassword1">Confirm Password</label>
      <input type="password" class="form-control" name="cfpwd" id="exampleInputPassword1" placeholder="Password" required>
    </div>
   
    <div class="form-group">
      <label for="exampleTextarea" class="form-label mt-4">Address</label>
      <textarea class="form-control" name="fadd" id="exampleTextarea" rows="3" placeholder="Address"></textarea>
    </div>
    
    <div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">Full Name</label>
      <input type="text" class="form-control" name="fname" id="exampleInputPassword1" placeholder="Insert your full name" required>
    </div>

    <div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">Email</label>
      <input type="email" class="form-control" name="femail" id="exampleInputPassword1" placeholder="xxxxxx@email.com" required>
    </div>
    
    <div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">Contact Number</label>
      <input type="text" class="form-control" name="fcontact" id="exampleInputPassword1" placeholder="xxx-xxxxxxxx" required>
    </div>
   
    <div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">License No.</label>
      <input type="text" class="form-control" name="flic" id="exampleInputPassword1" placeholder="License Number" required>
    </div>
    
    <br>
    <button type="reset" class="btn btn-warning">Clear</button><button type="submit" class="btn btn-primary">Submit</button>
    <br><br><br>

  </fieldset>
</form>

</div>

<?php include 'footer.php'; ?>