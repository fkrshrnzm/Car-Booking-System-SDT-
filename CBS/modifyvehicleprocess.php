<?php
include("dbconnect.php");
//Get vehicle registration
if(isset($_GET['id']))
{
    $vhreg = $_GET['id'];

}

if (isset($_POST['submit']) && isset($_FILES['vhmedia'])) {



$img_name = $_FILES['vhmedia']['name'];
$img_size = $_FILES['vhmedia']['size'];
$tmp_name = $_FILES['vhmedia']['tmp_name'];
$error = $_FILES['vhmedia']['error'];

$vhreg = $_POST['vhreg'];
$vhtype = $_POST['vhtype'];
$vhmodel = $_POST['vhmodel'];
$vhyear = $_POST['vhyear'];
$vhprice = $_POST['vhprice'];

if ($error === 0) {
    if ($img_size > 1300000) {
        $em = "Sorry, your file is too large.";
        header("Location: index.php?error=$em");
    }else {
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);

        $allowed_exs = array("jpg", "jpeg", "png"); 

        if (in_array($img_ex_lc, $allowed_exs)) {
           $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
           $img_upload_path = 'media/'.$new_img_name;
            move_uploaded_file($tmp_name, $img_upload_path);      

            if ($vhtype != NULL) {
                $query1 = "UPDATE tb_vehicle SET vh_type = '$vhtype' WHERE vh_registration = '$vhreg'";
                $result = mysqli_query($con, $query1);
            }
            if ($vhmodel != NULL) {
                $query2 = "UPDATE tb_vehicle SET vh_model = '$vhmodel' WHERE vh_registration = '$vhreg'";
                $result = mysqli_query($con, $query2);
            }
            if ($vhyear != NULL) {
                $query3 = "UPDATE tb_vehicle SET vh_year = '$vhyear' WHERE vh_registration = '$vhreg'";
                $result = mysqli_query($con, $query3);
            }
            if ($vhprice != NULL) {
                $query4 = "UPDATE tb_vehicle SET vh_price = '$vhprice' WHERE vh_registration = '$vhreg'";
                $result = mysqli_query($con, $query4);
            }
            if ($new_img_name != NULL) {
                $query5 = "UPDATE tb_vehicle SET vh_media = '$new_img_name' WHERE vh_registration = '$vhreg'";
                $result = mysqli_query($con, $query5);
            }
            mysqli_close($con);
            header("location: staff.php");
            /*$sql = "UPDATE tb_vehicle
            SET vh_type='$vhtype', vh_model='$vhmodel', vh_year='$vhyear', vh_price='$vhprice', vh_media='$new_img_name'
            WHERE vh_registration='$vhreg'";
            mysqli_query($con, $sql);
            ;*/
        }
        else {
            $em = "You can't upload files of this type";
            header("Location: addvehicle.php?error=".urlencode($em)."#popup");
        }
    }
}
else {
    $em = "unknown error occurred!";
    header("Location: staffapproval.php?error=".urlencode($em)."#popup");
}

}
else {
$em = "unknown error occurred!";
header("Location: addvehicle.php?error=".urlencode($em)."#popup");
}

?>