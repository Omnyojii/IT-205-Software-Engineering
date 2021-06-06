<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
include "function.php";
$connect = connectdb();
// If form submitted, insert values into the database.

if (isset($_REQUEST['newAccount'])){
    // removes backslashes
    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($connect,$username); 
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($connect,$password);

    $data = array(
        'username' => $username,
        'password' => $password,
    );

    $add =  insert('admin', $data);

    if($add){
        header("location: login.php");
    }
    }else{
?>
<div class="form">
    <h1>Registration</h1>
    <form name="registration" action="" method="post">
        <input type="text" name="username" placeholder="Username" required />
        <input type="password" name="password" placeholder="Password" required />
        <input type="submit" name="newAccount" value="Register" />
    </form>
</div>
<?php } ?>
</body>
</html>