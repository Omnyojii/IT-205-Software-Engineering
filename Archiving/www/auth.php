<?php
session_start();
if(!isset($_SESSION["cuser"])){
    header("Location: index.php");
    exit();
}


// if (isSuperAdmin()) {
//     $_SESSION['msg'] = "Welcome Super Admin";
//     // header('location: ../login.php');
// }
// else if (isAdmin()) {
//     $_SESSION['msg'] = "Welcome Admin";
//     // header('location: ../login.php');
// }
// else if(isAdmin()) {
//     $_SESSION['msg'] = "Welcome User";
//     // header('location: ../login.php');
// }
// $isUser = $_SESSION['cuser']['UserID'];

function getlog($thesisid, $loginuser){
	$conn = connectdb();

	date_default_timezone_set('Asia/Manila');

	$dt = date("Y-m-d h:i:s");

	$sql = "INSERT INTO activitylog (ThesisID, User_id, DateAccessed) VALUES ('$thesisid','$loginuser','$dt')";

	if ($conn->query($sql) === TRUE) {
		echo "<script>console.log('Success');</script>";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
}


function isSuperAdmin(){
	if ($_SESSION['cuser']['UserType'] != 'superadmin' ) {
		header("location:javascript://history.go(-1)");
		// header('Location: ' . $_SERVER['HTTP_REFERER']);
		// header("Location: dashboard.php");
		exit();
	}
}

function isAdmin(){
	if ($_SESSION['cuser']['UserType'] == 'admin' || $_SESSION['cuser']['UserType'] == 'superadmin') {
		// header("location:javascript://history.go(-1)");
		// header('Location: ' . $_SERVER['HTTP_REFERER']);
		// header("Location: dashboard.php");
		return true;
		exit();
	}else{
		header("location:javascript://history.go(-1)");
	}
}

function islogin($loginuser){
	$conn = connectdb();

	$dt = date("Y-m-d h:i:s");
	// $dt = echo '<script type="text/JavaScript">dateTime();</script>';

	$sql = "INSERT INTO loginhistory (user_id, date_login) VALUES ('$loginuser', '$dt')";

	if ($conn->query($sql) === TRUE) {
		echo "<script>alert('Success');</script>";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
}

function islogout($logoutuser){
	$conn = connectdb();
	$dl = date("Y-m-d h:i:s");
	// echo '<script type="text/JavaScript">dateTime();</script>';

	$sql = "UPDATE loginhistory SET date_logout = '$dl' WHERE id = '$logoutuser'";

	// $query = mysqli_query($conn, $sql);

	if ($conn->query($sql) === TRUE)  {
        echo "<script>alert('Success');</script>";
        // die();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
		// die();
    }
    $conn->close();
}

// function isDean(){
// 	if ($_SESSION['cuser']['UserType'] != 'dean' ) {
// 		header('Location: ' . $_SERVER['HTTP_REFERER']);
// 		exit;
// 	}
// }

// function isManager(){
// 	if ($_SESSION['cuser']['UserType'] == 'admin' || $_SESSION['cuser']['UserType'] == 'superadmin' ) {
// 		return true;
// 	}else{
// 		header('Location: ' . $_SERVER['HTTP_REFERER']);
// 		exit;
// 	}
// }
?>



