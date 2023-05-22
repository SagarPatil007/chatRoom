<?php

include 'db_connect.php';

$msg = $_POST['text'];
$room = $_POST['room'];
$ip = $_POST['ip'];
$senderName = $_COOKIE['user'];
echo "<br>".$senderName."<br>";

$sql =  "INSERT INTO `msgs` ( `msg`, `room`,`senderName` ,`ip`, `stime`) 
        VALUES ( '$msg', '$room', '$senderName','$ip', current_timestamp());";

mysqli_query($con,$sql);
mysqli_close($con);

?>