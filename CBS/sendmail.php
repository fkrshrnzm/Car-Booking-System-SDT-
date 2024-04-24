<?php
//
// *** To Email ***
$to = 'Recipients-Email-To-Here';
//
// *** Subject Email ***
$subject = 'Subject to Here';
//
// *** Content Email ***
$content = 'Content to Here';
//
//*** Head Email ***
$headers = "From: Your-Email\r\n";
//
//*** Show the result... ***
if (mail($to, $subject, $content, $headers))
{
	echo "Success !!!";
} 
else 
{
   	echo "ERROR";
}

?>