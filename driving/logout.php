<!-- <?PHP

session_start();
session_destroy();
header("Location: index.php");
?> -->

<?php
session_start();
unset($_SESSION["id"]);
unset($_SESSION["name"]);
header("Location:index.php");
?>