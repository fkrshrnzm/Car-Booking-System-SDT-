<?php
include("dbconnect.php");

if (isset($_POST['submit']) && isset($_FILES['vhmedia'])) {



echo "<pre>";
print_r($_FILES['vhmedia']);
echo "</pre>";

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

            // Insert into Database
            $sql = "INSERT INTO tb_vehicle(vh_registration, vh_type, vh_model, vh_year, 
            vh_price, vh_media)
            VALUES ('$vhreg','$vhtype', '$vhmodel', '$vhyear', '$vhprice', '$new_img_name')";	
            mysqli_query($con, $sql);
            mysqli_close($con);
            header("location: staff.php");
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