<?php
include ('dbconnect.php'); 
$uid = $_SESSION['uid'];
$sql = "SELECT * FROM tb_users WHERE u_id = $uid";

$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

if($row['u_type'] == 2){
  session_destroy();
  echo "<script>
    window.location.href='login.php';
    alert('The page is not available.');
    </script>";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>KieeHub Services</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="bootstrap.min.css" rel="stylesheet"type='text/css'>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

  <link rel="icon" type="image/x-icon" href="favicon.ico">

  <style>
.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: black;
   color: grey;
   text-align: center;
}
</style>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
  <a class="navbar-brand" href="index.php"><strong class="text-light">KAR</strong><strong class="text-warning">HUB</strong></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="staff.php">Home</a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link" href="staffview.php">Manage Booking</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="vehicle.php">Vehicle List</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="adminsearchbooking.php">Search Booking</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#" onclick="confirmLogout()">Logout</a>
        </li>
        
        <script>
        function confirmLogout() {
          if (confirm("Are you sure you want to log out?")) {
            window.location.href = "logout.php";
          }
        }
        </script>

      </ul>
    </div>
  </div>
</nav>
