<?php
  include "config.php";
  $connect = connectdb();

  if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $pwd = $_POST['password'];
    

    if(emptyInputLogin($username, $pwd) !== false){
       header("location: login.php?error=emptyinput");
       exit();
    }

    loginUser($connect, $username, $pwd);

  }
  else{
     header("location: login.php");
     exit();
  }
?>
<html>
<head>
<title>User Login</title>
</head>
<body>
   <form name="frmUser" method="post" action="" align="center">
      <div class="message"><?php if($message!="") { echo $message; } ?></div>
      <h3 align="center">Enter Login Details</h3>
      Username:<br>
      <input type="text" name="user_name">
      <br>
      Password:<br>
      <input type="password" name="password">
      <br><br>
      <input type="submit" name="submit" value="Submit">
      <input type="reset">
   </form>
</body>
</html>