<?php
include "function.php";
$conn = connectdb();

if (isset($_POST['updateAccount'])){
    $userID = $_POST['userID'];
    $username = $_POST['uName'];
	$password = $_POST['uPass'];
	$fullname = $_POST['fullname'];
	$college = $_POST['college'];
	$uType = $_POST['uType'];
	$uPerms = $_POST['uPerms'];

    // $data = array(
    //     'UserID' => $userID,
    //     'Username' => $username,
    //     'Password' => $password,
    //     'Fullname' => $fullname,
    //     'College' => $college,
    //     'UserType' => $uType,
    //     'Perms' => $uPerms,
    // );

    // $sql = update('users', $userID, $data);

    $sql = "UPDATE users SET Username = '$username', Password = '$password', Fullname = '$fullname', College = '$college', UserType = '$uType', Perms = '$uPerms' WHERE UserID = '$userID'";

    $query = mysqli_query($conn, $sql);

    if ($query) {
        echo "<script>alert('Account updated successfully');window.location.href=document.referrer;</script>";
        die();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>




