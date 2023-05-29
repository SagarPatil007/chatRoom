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
        // set the cookies
        setcookie("user", $username);
        setcookie("uid", $uid);
    }else{
        $message = "Incorrect UserName and Password."; 
        echo '<script type="text/javascript">';
        echo 'window.location="http://localhost:80/php/ChatRoom%20PHP/index.html";';
        echo 'alert("'.$message.'");';
        echo '</script>';
    }
}else{
    $message = "Incorrect UserName and Password."; 
    echo '<script type="text/javascript">';
    echo 'window.location="http://localhost:80/php/ChatRoom%20PHP/index.html";';
    echo 'alert("'.$message.'");';
    echo '</script>';
    echo mysqli_error($con);
}

?>