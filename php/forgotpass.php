<?php


include 'db_connect.php';
$pass1 = $_POST['Npass1'];
$pass2 = $_POST['Cpass2'];
$uid = $_COOKIE['uid'];

if($pass1 == $pass2){
    echo "Success";

    $sql = "UPDATE `account` SET `Password` = '$pass1' WHERE `account`.`UID` =".$uid; 

    if(mysqli_query($con,$sql)){
        $message = "Password changed Successfully."; 
        echo '<script type="text/javascript">';
        echo 'alert("'.$message.'");';
        echo 'window.location="http://localhost:80/php/ChatRoom%20PHP/index.html";';
        echo '</script>';
        
    }

}else{
    $message = "The Password are does not match"; 
    echo '<script type="text/javascript">';
    echo 'alert("'.$message.'");';
    echo 'window.location="http://localhost:80/php/ChatRoom%20PHP/ForgotPass.html";';
    echo '</script>';
}

?>
