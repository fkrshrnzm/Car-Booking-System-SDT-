<?php
/*session_start();
if (isset($_POST['logout'])) {
    if (confirm('Are you sure you want to log out?')) {
        // Log the user out
        session_destroy();
        header("Location: login.php");
    } else {
        // The user clicked "Cancel"
        header("Location: .php");
    }
}

session_destroy();
header('location:login.php');
*/

session_start();
session_destroy();
header("Location: login.php");

?>

