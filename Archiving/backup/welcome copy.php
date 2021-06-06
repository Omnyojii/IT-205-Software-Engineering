<?php
//include auth.php file on all secure pages
include "auth.php";
include "function.php";
connectdb();

?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title>Welcome Home</title>
   <link rel="stylesheet" type="text/css" href="css/style.css">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins|Audiowide">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="alternate" href="https://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" type="application/atom+xml" title="Atom">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
   <script src="script.js"></script>
</head>
<body>
   <nav>
      <div class="navbar">
         <a class="active" href="dashboard.php"><i class="fa fa-fw fa-home"></i> Home</a> 
         <a href="archive.php"><i class="fas fa-archive"></i> Archive</a> 
         <a href="https://www.smciligan.edu.ph/"><i class="fab fa-facebook-square"></i> SMC</a> 
         <a href="#" class="notification" >
            <span><i class="fas fa-bell"></i></span>
            <span class="badge">3</span>
         </a>
         <a href="logout.php" style="float: right;"><i class="fas fa-sign-out-alt"></i></a>
      </div>
   </nav>
   <div class="form">
      <p>Welcome <?php echo $_SESSION['username']; ?>!</p>
      <p>This is secure area.</p>
   </div>
</body>
</html>