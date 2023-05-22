<?php

include 'db_connect.php';
$name = $_POST['Username'];
$email = $_POST['Email'];
$password = $_POST['Password'];
$mobile_no = $_POST['mobile_no'];

$sql = "INSERT INTO `account` (`Name`, `Email`, `Password`, `Mobile_no`) VALUES ('$name', '$email', '$password', '$mobile_no');";

$result = mysqli_query($con,$sql);

if($result){
    header("Location: http://localhost:80/php/ChatRoom%20PHP/signin.html");
}else{
    echo mysqli_error($con);
}

?>
