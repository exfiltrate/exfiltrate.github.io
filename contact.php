<?php

require('config.php');

extract($_POST);

$sql = "INSERT into contactus (name,email,message,created_date) VALUES('" . xss_cleaner($name) . "','" . xss_cleaner($email) . "','" . xss_cleaner($message) . "','" . xss_cleaner(date('Y-m-d')) . "')";

$success = $mysqli->query($sql);

if (!$success) {
    die("Couldn't enter data: ".$mysqli->error);
}

echo "Thank you for contacting us!";
header('Location: https://oxidyze.com/index.php?contact=success#contact');

$conn->close();

function xss_cleaner($input_str) {
    $return_str = str_replace( array('<',';','|','&','>',"'",'"',')','('), array('&lt;','&#58;','&#124;','&#38;','&gt;','&apos;','&#x22;','&#x29;','&#x28;'), $input_str );
    $return_str = str_ireplace( '%3Cscript', '', $return_str );
    return $return_str;
}

?>