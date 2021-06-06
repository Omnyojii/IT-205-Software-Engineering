<?php
require "function.php";
connectdb();
include "auth.php";
isAdmin();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Secured Page</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
</head>
<body>
    <nav>
      <div class="navbar">
         <a href="dashboard2.php" class="active"><i class="fa fa-fw fa-home"></i> Home</a> 
         <a href="archive2.php" class=""><i class="fas fa-archive"></i> Archive</a> 
         <a href="createarchive.php" class=""><i class="fas fa-folder-plus"></i> Create Archive</a> 
         <a href="logout.php" style="float: right;"><i class="fas fa-sign-out-alt"></i></a>
         <a href="#" style="float: right;"><i class="fas fa-id-card"></i> <?php echo $_SESSION['cuser']['Username']; ?><span  style="color: #888; font-size: 10px;"> (<?php echo ucfirst($_SESSION['cuser']['UserType']); ?>)</span></a>
      </div>
    </nav>
</body>
</html>