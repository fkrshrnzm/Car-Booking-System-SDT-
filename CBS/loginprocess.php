<?php
session_start();

//DB Connection
include ("dbconnect.php");

//Retrieve Input
$fic = $_POST['fic'];
$fpwd = $_POST['fpwd'];
$fic = stripcslashes($fic);
$fpwd = stripcslashes($fpwd);
$fic = mysqli_real_escape_string($con,$fic);
$fpwd = mysqli_real_escape_string($con,$fpwd);


//Get user data from DB
$sql = "SELECT * FROM tb_users WHERE u_id='$fic'";


//Execute SQL

$result=mysqli_query($con,$sql);
$count=mysqli_num_rows($result);


//Login check
if($count==1) //User found
{

    while ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($fpwd, $row['u_pwd'])) {
            //Set session
            $_SESSION['u_id'] = session_id();
            $_SESSION['uid'] = $fic;

            if ($row['u_type'] == 1) //Staff
            {
                header('location:staff.php');
            } else //Customer
            {
                header('location:customer.php');
            }
        }
        else{
            echo "<script>
            window.location.href='login.php';
            alert('Incorrect password. Please try again');
            </script>";
        }
    }
}
else // User not found
{
    echo "<script>
    window.location.href='login.php';
    alert('User not found. Please try again or register for another account');
    </script>";
}

mysqli_close($con);