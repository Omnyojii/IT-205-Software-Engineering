<?php 
session_start();
include "function.php";
$connect = connectdb();

if(!$connect){
	header("Location: admin.php");
}

if(isset($_POST['username'])){

	$username = $_POST['username'];
	$password = $_POST['password'];

	// $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
	$sql = "SELECT * FROM admin WHERE username = '{$username}' AND password = '{$password}'";

	$query = mysqli_query($connect, $sql);

	if($query->num_rows > 0){
		$logged_in_user = mysqli_fetch_assoc($query);

		$_SESSION['admin'] = $logged_in_user;
		$isUser = $_SESSION['cuser']['UserID'];
		header('location: reservations.php');
	}

	else{
		$_SESSION['error'] = "Invalid User";
		header("Location: admin.php");
	}
}

?>