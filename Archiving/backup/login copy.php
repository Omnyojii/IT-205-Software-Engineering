<?php 
session_start();
include "function.php";
$connect = connectdb();

if(!$connect){
	header("Location: index.php");
}

if(isset($_POST['username'])){
	login();
}

function login(){
	global $username;

	$username = $_POST['username'];
	$password = $_POST['password'];

	if (count($errors) == 0) {

		$sql = "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}'";
		$query = mysqli_query($connect, $sql);

		if($query->num_rows > 0){
			$logged_in_user = mysqli_fetch_assoc($query);

			if ($logged_in_user['UserType'] == 'superadmin') {

				$_SESSION['username'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: dashboard.php');
			}
			else if ($logged_in_user['UserType'] == 'admin') {

				$_SESSION['username'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: dashboard.php');
			}
			else{
				$_SESSION['username'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";

				header('location: dashboard.php');
			}
		}
		else {
			$_SESSION['error'] = "Invalid User";
			array_push($errors, "Wrong username/password combination");
			header("Location: index.php");
		}
	}



	// if($query->num_rows > 0){
	// 	$_SESSION['username'] = $username;
	// 	header("Location: dashboard.php");
	// }else{
	// 	$_SESSION['error'] = "Invalid User";
	// 	header("Location: index.php");
	// }
}
?>