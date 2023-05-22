<?php

$room = $_POST['room']; 

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
   checkuser();
  
}else{    
    // checking room name
    if(strlen($room)>20 or strlen($room)<2 ) {
        $message = "please choose a name between 2 to 20 characters"; 
        echo '<script type="text/javascript">';
        echo 'alert("'.$message.'");';
        echo 'window.location="http://localhost:80/php/ChatRoom%20PHP/";';
        echo '</script>';
    }
    else if(!ctype_alnum($room)){
        $message = "please choose an alphanumeric room name"; 
        echo '<script type="text/javascript">';
        echo 'alert("'.$message.'");';
        echo 'window.location="http://localhost:80/php/ChatRoom%20PHP/";';
        echo '</script>';
    }
    else{
        // connect to the database        
        include 'db_connect.php';
    }
}

$sql ="SELECT * FROM `room` WHERE roomname = '$room'";
$result  = mysqli_query($con, $sql);

if($result){

    if(mysqli_num_rows($result) > 0){
        $message = "Please choose different room name.This room is already exist"; 
        echo '<script type="text/javascript">';
        echo 'alert("'.$message.'");';
        echo 'window.location="http://localhost:80/php/ChatRoom%20PHP/";';
        echo '</script>';
    }
    else
    {
        $sql = "INSERT INTO `room`  (`roomname`, `stime`) VALUES ( '$room', current_timestamp());";

        if(mysqli_query($con,$sql)){
            $message = "Your room is creates successfully now you can chat"; 
            echo '<script type="text/javascript">';
            echo 'alert("'.$message.'");';
            echo 'window.location="http://localhost:80/php/ChatRoom%20PHP/php/rooms.php?roomname='.$room.'";';
            echo '</script>';
            }
    } 
}
else{
    echo "Error ".mysqli_error($con);
}
?>