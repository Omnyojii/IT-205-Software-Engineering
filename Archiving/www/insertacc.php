<?php
include "function.php";
$conn = connectdb();


if (isset($_POST['newAccount'])){
    $username = $_POST['uName'];
	$password = $_POST['uPass'];
	$fullname = $_POST['fullname'];
	$college = $_POST['college'];
	$uType = $_POST['uType'];
	$uPerms = $_POST['uPerms'];

    $data = array(
        'Username' => $password,
        'Password' => $password,
        'Fullname' => $fullname,
        'College' => $college,
        'UserType' => $uType,
        'Perms' => $uPerms,
    );

    $sql = insert('users', $data);

    if ($sql) {
        // echo "New record created successfully";
        echo "<script>alert('username successfully registered');window.location.href=document.referrer;</script>";
        die();
      }
      else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>




