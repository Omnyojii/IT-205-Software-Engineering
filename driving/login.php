<?php 
include("function.php");
$connectdb = connectdb();
if(!$connectdb){
	header("Location: index.php");
}

if(isset($_POST['login'])){

	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}'";

	$query = mysqli_query($connectdb, $sql);

	if($query->num_rows > 0){
		$_SESSION['login'] = true;
		header("Location: dashboard.php");
	}else{
		$_SESSION['error'] = "Invalid User";
		header("Location: index.php");
	}
}	
?>