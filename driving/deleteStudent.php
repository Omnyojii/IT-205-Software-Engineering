<?php 
include "function.php";

$connect = connectdb();
if(isset($_GET['uid'])){
	$uid = $_GET['uid'];
	var_dump($_GET);
	$delete = delete('student', $uid);
	if($delete){
		header('Location: student.php');
	}
}
?>