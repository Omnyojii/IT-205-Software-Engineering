<?php 
session_start();
include "function.php";
$connect = connectdb();

if(!$connect){
	header("Location: index.php");
}

if(isset($_POST['username'])){

	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}'";

	$query = mysqli_query($connect, $sql);

	if($query->num_rows > 0){
		$_SESSION['username'] = $username;
		header("Location: dashboard.php");
	}else{
		$_SESSION['error'] = "Invalid User";
		header("Location: index.php");
	}
}
?>