<?php
include("dbconnect.php");
include 'cbssession.php';
if(!session_id())
{
    session_start();
}



$uid = $_SESSION['uid'];
$fpwd = $_POST['fpwd'];
$cfpwd = $_POST['cfpwd'];


$sql0 = "SELECT * FROM tb_users WHERE u_id = '$uid'";
$result = mysqli_query($con,$sql0);

if($fpwd == $cfpwd){
    $fpwd = password_hash($_POST['fpwd'], PASSWORD_DEFAULT);
    $sql = "UPDATE tb_users SET u_pwd = '$fpwd' WHERE u_id = '$uid'";
    $result = mysqli_query($con, $sql);
        //echo $fic . '<br>' . $cfpwd;
    mysqli_close($con);
    
    echo "<script>
    window.location.href='customerprofile.php';
    alert('Password updated successfully.');
    </script>";
    echo '</div>';
    
}
else{
    echo "<script>
    window.location.href='changepassword.php';
    alert('Unsuccessful. Please enter the same password in Change Password and Confirm New Password.');
    </script>";
}


?>