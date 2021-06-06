<?php
include "auth.php";
require "function.php";
connectdb();
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
         <a href="dashboard.php" class="active"><i class="fa fa-fw fa-home"></i> Home</a> 
         <a href="archive.php" class=""><i class="fas fa-archive"></i> Archive</a>
         <?php
            if ($_SESSION['cuser']['UserType'] == 'admin' || $_SESSION['cuser']['UserType'] == 'superadmin' ) {
                ?>
                <a href="managearchive.php" class=""><i class="fas fa-folder-plus"></i> Create Archive</a> 
                <?php
            }
            if ($_SESSION['cuser']['UserType'] == 'superadmin' ) {
                ?>
                <a href="manageaccount.php" class=""><i class="fas fa-user-plus"></i> Manage Account</a>
                <a href="view.php"><i class="fas fa-users"></i> View Accounts</a>
                <a href="activitylogs.php" class=""><i class="fas fa-id-card"></i>  Activity Logs</a>
                <a href="loginhistory.php" class="" ><i class="fas fa-user-clock"></i> Login History</a>
                <a href="notification.php" class="" ><i class="fas fa-bell"></i> Login Request</a>
                <?php
            }
         ?>
         <a href="logout.php" style="float: right;">Logout <i class="fas fa-sign-out-alt"></i></a>
         <a href="#" style="float: right;"><i class="fas fa-id-badge"></i> <?php echo $_SESSION['cuser']['Username']; ?><span  style="color: #888; font-size: 10px;"> (<?php echo ucfirst($_SESSION['cuser']['UserType']); ?>)</span></a>
      </div>
    </nav>
</body>
</html>