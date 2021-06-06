<?php 
session_start();
include "function.php";
$connect = connectdb();

if(!$connect){
	header("Location: index.php");
}

if(isset($_POST['username'])){
	global $newUser, $outUser, $dt, $dl;

	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}'";

	$query = mysqli_query($connect, $sql);

	if($query->num_rows > 0){
		$logged_in_user = mysqli_fetch_assoc($query);

		if ($logged_in_user['UserType'] == 'superadmin') {
			$_SESSION['cuser'] = $logged_in_user;
			$isUser = $_SESSION['cuser']['UserID'];
			islogin($isUser);
			header('location: dashboard.php');
		}
		else if($logged_in_user['UserType'] == 'admin') {
			$_SESSION['cuser'] = $logged_in_user;
			$isUser = $_SESSION['cuser']['UserID'];
			islogin($isUser);
			header('location: dashboard.php');
		}
		else if($logged_in_user['UserType'] == 'dean'){
			$_SESSION['cuser'] = $logged_in_user;
			$isUser = $_SESSION['cuser']['UserID'];
			islogin($isUser);
			header('location: dashboard.php');
		}
		else if($logged_in_user['UserType'] == 'user' && $logged_in_user['Perms'] == 1){
			$_SESSION['cuser'] = $logged_in_user;
			$isUser = $_SESSION['cuser']['UserID'];
			islogin($isUser);
			header('location: dashboard.php');
		}
		else{
			$_SESSION['error'] = "Invalid User";
			header("Location: index.php");
		}
	}

	else{
		$_SESSION['error'] = "Invalid User";
		header("Location: index.php");
	}
}


function islogin($loginuser){
	$conn = connectdb();
	// $dt = echo '<script type="text/JavaScript">dateTime();</script>';
	date_default_timezone_set('Asia/Manila');

	$dt = date("Y-m-d H:i:s");

	$sql = "INSERT INTO loginhistory (user_id, date_login) VALUES ('$loginuser', '$dt')";

	if ($conn->query($sql) === TRUE) {
		// $last_id = mysqli_insert_id($conn);
		$last_id = $conn->insert_id;
		$_SESSION['loginhistory'] = $last_id;
		// echo "New record created successfully. Last inserted ID is: " . $last_id;
		// echo "<script>alert('Success');</script>";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
}
?>