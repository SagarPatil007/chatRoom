<?php

include 'db_connect.php';

$name = $_POST['Name'];
$password = $_POST['Password'];

$sql = "SELECT * FROM `account` WHERE `Name`='$name'";
$result = mysqli_query($con,$sql);
$numrows = mysqli_num_rows($result);

if($numrows != 0){
    while($row = mysqli_fetch_assoc($result)){
        $username = $row['Name'];
        $userpassword = $row['Password'];
        $uid = $row['UID'];
    }
    if($name == $username && $password == $userpassword){
        header("Location: http://localhost:80/php/ChatRoom%20PHP/index.html");
        setcookie("user", $username);
        setcookie("uid", $uid);
    }else{
        echo "Incorrect password";
    }
}else{
    echo mysqli_error($con);
}
?>