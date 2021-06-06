<?php 
include "function.php";

$connect = connectdb();
if(isset($_GET['uid'])){
	$id = $_GET['uid'];
	$delete = delete('enrollment', $id);
	if($delete){
		header('Location: dashboard.php');
	}
}
?>