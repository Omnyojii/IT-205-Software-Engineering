<?php

include 'connection.php';
$conn = connectdb();

$fn = $_POST['firstname'];
$ln = $_POST['lastname'];

$sql = "INSERT INTO user (firstname, lastname)
        VALUES ('$fn', '$ln')";

if ($conn->query($sql) === TRUE) {
  // echo "New record created successfully";
  // echo "<script>alert('New record created successfully');window.location.href='index.php';</script>";
  header('Location: ' . $_SERVER['HTTP_REFERER']);
  die();
}
else {
  echo "Error: " . $sql . "<br>" . $conn->error;
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}

$conn->close();

?>