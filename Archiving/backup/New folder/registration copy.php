<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
session_start();
include "function.php";
$connect = connectdb();
// If form submitted, insert values into the database.

if (isset($_REQUEST['username'])){
    // removes backslashes
    $username = $_POST['username'];
	$password = $_POST['password'];
    $usertype = $_POST['usertype'];
	$perms = $_POST['perms'];

    $data = array(
        'username' => $username,
        'password' => $password,
        'UserType' => $usertype,
        'Perms' => $perms,
    );

    $curry =  insert('admin', $data);

    if($curry){
        header("location: login.php");
    }
    }else{
?>
<div class="form">
    <h1>Registration</h1>
    <form name="registration" action="" method="post">
        <input type="text" name="username" placeholder="Username" required />
        <input type="password" name="password" placeholder="Password" required />
        <select id="usertype" name="usertype">
            <option value="user">user</option>
            <option value="admin">admin</option>
        </select>
        <input type="number" name="perms" placeholder="Password" required />
        <input type="submit" name="submit" value="Register" />
    </form>
</div>
<?php } ?>
</body>
</html>