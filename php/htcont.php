<?php

$room = $_POST['room'];
include 'db_connect.php';
$sql = "SELECT msg ,stime ,ip ,senderName FROM msgs WHERE room = '$room'";

$sessionuser = $_COOKIE['user'];

$res = "";
$result = mysqli_query($con,$sql);

if(mysqli_num_rows($result)>0){

    while($row = mysqli_fetch_assoc($result)){

        if($row['senderName']== $sessionuser){
            $res = $res. '<div class="container darker">';
            $res = $res. '<div class="send">';
            $res = $res. '<div style="font-weight: bold;">'.$row['ip'].'</div>';
            $res = $res ."<p>".$row['msg'];
            $res = $res. '<p> <span class= "time-right">' .$row["stime"] .'</span></div>';
            $res = $res .'</div>';
        }
        else{
            $res = $res. '<div class="container">';
            $res = $res. '<div style="font-weight:bold;">'.$row['ip'].'</div>';
            $res = $res ."<p >".$row['msg'];
            $res = $res. '<p> <span class= "time-left">' .$row["stime"] .'</span></div>';
            $res = $res .'</div>';
        }
    }
}

echo $res;
?>