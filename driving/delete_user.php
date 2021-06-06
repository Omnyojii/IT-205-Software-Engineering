<?php 
$mysql_server = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_db = "sis";
$connect = new mysqli($mysql_server,$mysql_user,$mysql_password,$mysql_db);
if($connect->connect_errno){
	printf("Connection failed: %s \n",$connect->connect_error);
	exit();
}else{
	echo "Connection successful!";
}	
$connect->set_charset("utf8");



$uID = $_GET['uID'];

$sql = "DELETE FROM user WHERE user_id='$uID'";
$query = mysqli_query($connect,$sql);
header("Location: list_users.php");

?>