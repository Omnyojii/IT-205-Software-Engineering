<?php 
    include 'function.php';
    $conn = connectdb();

    $newID = $_GET['uid'];
    // function allowUser(){
    $sql = "UPDATE users SET Perms = '1' WHERE UserID = '$newID'";

    $query = mysqli_query($conn, $sql);

    if ($query) {
        echo "<script>alert('User Allowed');window.location.href='notification.php';</script>";
        die();
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    // }
?>