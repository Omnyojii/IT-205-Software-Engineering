<?php 
include 'auth.php';
include 'function.php';
$conn = connectdb();

session_start();

$id = $_GET['uid'];
$isUser = $_SESSION['cuser']['UserID'];

$getlog = getlog($id,$isUser);

if ($getlog) {
	// header('Location: view.php');
	// echo "<script>alert('Record deleted successfully');window.location.href='view.php';</script>";
    // echo "<script>console.log('New record created successfully');window.location.href=document.referrer;</script>";
	header("location:javascript://history.go(-1)");
	die();
}
else {
    // echo "<script>console.log('New record created successfully');window.location.href=document.referrer;</script>";
	header("location:javascript://history.go(-1)");
	// echo "Error: " . $query . "<br>" . $conn->error;
}

// function getlog($thesisid, $loginuser){
// 	$conn = connectdb();

// 	date_default_timezone_set('Asia/Manila');

// 	$dt = date("Y-m-d H:i:s");

// 	$sql = "INSERT INTO activitylog (ThesisID, User_id, DateAccessed) VALUES ('$thesisid','$loginuser','$dt')";

// 	if ($conn->query($sql) === TRUE) {
// 		echo "<script>console.log('Success');</script>";
// 	} else {
// 		echo "Error: " . $sql . "<br>" . $conn->error;
// 	}

// 	$conn->close();
// }
?>