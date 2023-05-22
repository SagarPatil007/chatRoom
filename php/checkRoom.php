<?php

include 'db_connect.php';

$roomName = $_GET['roomName'];

$cuser = $_COOKIE['user'];

function checkuser(){
    $message = "Please Login to Your Account. You are Redirected to Login Page"; 
    echo '<script type="text/javascript">';
    echo 'alert("'.$message.'");';
    echo 'window.location="http://localhost:80/php/ChatRoom%20PHP/signin.html";';
    echo '</script>';
    exit();
}

if(!isset($cuser)){
    // check user Logged in or not
    checkuser();
}else{

    $sql = "SELECT * FROM `room` WHERE roomname ='$roomName'";

    $result = mysqli_query($con,$sql);
    if($result){
        // if room is exists
        if(mysqli_num_rows($result)== 0){
            $message = "This Room does'not exists. Try creating a new one" ; 
            echo '<script type="text/javascript">';
            echo 'alert("'.$message.'");';
            echo 'window.location="http://localhost:80/php/ChatRoom%20PHP/";';
            echo '</script>';
        }else{
            header("Location: http://localhost:80/php/ChatRoom%20PHP/php/rooms.php?roomname=".$roomName);
        }
    }
}
?>