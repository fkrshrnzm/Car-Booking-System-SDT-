<?php

include ("dbconnect.php");

$fic = $_POST['fic'];
$fpwd = $_POST['fpwd'];
$cfpwd = $_POST['cfpwd'];
$fadd = $_POST['fadd'];
$fname = $_POST['fname'];
$femail = $_POST['femail'];
$fcontact = $_POST['fcontact'];
$flic = $_POST['flic'];

$sql0 = "SELECT * FROM tb_users WHERE u_id = '$fic'";
$result = mysqli_query($con,$sql0);
if($result){
    $count = mysqli_num_rows($result);
    if($count>0){
        $user = 1;
    }
    else{
        if($fpwd == $cfpwd){
            $fpwd = password_hash($_POST['fpwd'], PASSWORD_DEFAULT);
            $sql = "INSERT INTO tb_users(u_id, u_pwd, u_name, u_email, u_address, u_phone, u_license, u_type)
            VALUES ('$fic', '$fpwd', '$fname', '$femail', '$fadd', '$fcontact', '$flic', '2')";
            //echo $fic . '<br>' . $cfpwd;
            mysqli_query($con,$sql);
            mysqli_close($con);

            echo "<script>
            window.location.href='login.php';
            alert('Registration successful. Please login to book.');
            </script>";
            echo '</div>';

        }
        else{
            echo "<script>
            window.location.href='register.php';
            alert('Registration unsuccessful. Please enter the same password in Create Password and Confirm Password.');
            </script>";
        }
    }


} 


?>