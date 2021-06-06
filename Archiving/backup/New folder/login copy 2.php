<?php
   // include("function.php");
   include "function.php";
   $connect = connectdb();

   if (isset($_POST['username'])){
      // username and password sent from form 

      // $sql = "SELECT * FROM admin";
      // if( isset($_GET['search']) ){
      //    if(isset($_GET['taskOption']) ){
      //          $selectOption = mysqli_real_escape_string($connect, htmlspecialchars($_GET['taskOption']));
      //    }
      //    $name = mysqli_real_escape_string($connect, htmlspecialchars($_GET['search']));
      //    $sql = "SELECT * FROM account WHERE $selectOption ='$name'";
      // }
      // $result = $connect->query($sql);

      $username = stripslashes($_REQUEST['username']);
      $username = mysqli_real_escape_string($connect,$username);
      $password = stripslashes($_REQUEST['password']);
      $password = mysqli_real_escape_string($connect,$password);

      $query = "SELECT * FROM `users` WHERE username='$username' AND password='".md5($password)."'";
      $result = mysqli_query($connect,$query) or die(mysql_error());
	   $rows = mysqli_num_rows($result);

      if($rows == 1) {
         $_SESSION['username'] = $username;
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
      // ----------------------------------------------------------------------------------------------
      // $myusername = mysqli_real_escape_string($connect, htmlspecialchars($_POST['username']));
      // $mypassword = mysqli_real_escape_string($connect, htmlspecialchars($_POST['password']));
      // $sql = "SELECT * FROM admin WHERE username = '$myusername' AND passcode = '$mypassword'";
      // $query = mysqli_query($connect, $sql);
      // // $result = $connect->query($sql);
      // // $row = mysqli_fetch_array($query);
      // // $active = $row['active'];
      
      // $count = mysqli_num_rows($query);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      // if($count == 1) {
      //    session_register("myusername");
      //    $_SESSION['login_user'] = $myusername;
         
      //    header("location: welcome.php");
      // }else {
      //    $error = "Your Login Name or Password is invalid";
      // }
   }
?>
<html>
   
   <head>
      <title>Login Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>