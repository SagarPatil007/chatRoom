<?php 

$roomname = $_GET['roomname'];
include 'db_connect.php';

// Execute sql to check wheather room exists

$sql = "SELECT * FROM `room` WHERE roomname ='$roomname'";

$result = mysqli_query($con,$sql);
if($result){
    // if room is exists
    if(mysqli_num_rows($result)== 0){
        $message = "This Room does'not exists. Try creating a new one" ; 
        echo '<script type="text/javascript">';
        echo 'alert("'.$message.'");';
        echo 'window.location="http://localhost:80/php/ChatRoom%20PHP/rooms.php?roomname='.$room.'";';
        echo '</script>';
    }
}
else{
    echo mysqli_error($con);
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style> 

.container {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 8px;
  margin: 10px 0;
}
.text{
  text-align: center;
}

.darker {
  border-color: #ccc;
  float: right;
  background-color: #ddd;
}

.send{
  float: right;
}

.receive{
  float: left;
}

.container::after {
  content: "";
  clear: both;
  display: table;
}

.container img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.container img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
}

.anyclass{
  height:450px;
  overflow-y: scroll;  
}

</style>

  <!-- Bootstrap core CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>
<body >

<div style="padding: 20px;">
  <header class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom border-shadow">
  <a href="http://localhost:80/php/ChatRoom%20PHP/" class="d-flex align-items-center text-dark text-decoration-none">
    <span class="fs-3">ChatRoom.com</span>
  </a>

  <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
    <a class="me-3 py-2 text-dark text-decoration-none" href="http://localhost:80/php/ChatRoom%20PHP/index.html">Home</a>
    <a class="me-3 py-2 text-dark text-decoration-none" href="#">About</a>
    <a class="me-3 py-2 text-dark text-decoration-none" href="#">Contact</a>
  </nav>
  </header>
  </div>

<div class="form" >
<h2 class="text" >Chat Messages <?php echo $roomname ?></h2>

<div class="container">
  <div class="anyclass">
  
  </div>
</div>

<div class="modal-footer">
<input type="text" class="form-control container" id="usermsg" autocomplete="off" placeholder="Type your message"><br>
<button class="btn btn-primary " name="submitmsg" id ="submitmsg">Send</button>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" >

// check for new mesaages
setInterval(runFunction,1000);
function runFunction(){
  $.post("htcont.php", {room:'<?php echo $roomname?>'},
    function (data ,status){
      document.getElementsByClassName('anyclass')[0].innerHTML = data;
    }
  )
}

 // for submit the msg by enter key
  var input = document.getElementById("usermsg");
  input.addEventListener("keyup", function(event) {
    if (event.keyCode === 13) {
      event.preventDefault();
      document.getElementById("submitmsg").click();
    }
  });

  $("#submitmsg").click(function(){
      var clientmsg = $('#usermsg').val(); 
    $.post("postmsg.php", {text: clientmsg, room:'<?php echo $roomname?>' ,ip:'<?php  echo $_SERVER['REMOTE_ADDR']; ?>'},
    function(data,status){
      document.getElementsByClassName('anyclass')[0].innerHTMl = data;});
      $("#usermsg").val("");
      return false;
    });    
</script>


</body>
</html>
