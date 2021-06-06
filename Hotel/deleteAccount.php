<?php 
include 'function.php';
$conn = connectdb();

$id = $_GET['uid'];
$delete = delete('admin', $id);
if ($delete) {
	// header('Location: view.php');
	// echo "<script>alert('Record deleted successfully');window.location.href='view.php';</script>";
    echo "<script>alert('New record created successfully');window.location.href=document.referrer;</script>";
	die();
}
else {
	echo "Error: " . $query . "<br>" . $conn->error;
}
function delete($table, $id){
	$conn = connectdb();
	$sql = "DELETE FROM $table WHERE admin_id = '$id'";
	return mysqli_query($conn, $sql);
}
?>