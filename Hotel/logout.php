<?PHP
session_start();
session_destroy();
header("Location: admin.php");
?>

<?php
session_start();
unset($_SESSION["id"]);
unset($_SESSION["name"]);
header("Location:admin.php");
?>