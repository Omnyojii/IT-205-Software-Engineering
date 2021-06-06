<?php
//include auth.php file on all secure pages
include "auth.php";
isSuperAdmin();
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
   <script>
      function dateTime() {
         var today = new Date();
         var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
         var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
         var dateTime = date + ' ' + time;
         document.getElementById("mydate").value = dateTime;
      }
   </script>
   <style>
      p{
         color: white;
      }
   </style>
</head>
<body>
   <nav>
      <div class="navbar">
         <a href="dashboard3.php" class="" ><i class="fa fa-fw fa-home"></i> Home</a> 
         <a href="archive3.php"><i class="fas fa-archive"></i> Archive</a> 
         <a href="createarchive2.php" class="active"><i class="fas fa-folder-plus"></i> Create Archive</a> 
         <a href="registration.php"><i class="fas fa-user-plus"></i> Create Account</a> 
         <a href="view.php"><i class="fas fa-users"></i> View Accounts</a> 
         <a href="notification.php" class="" ><i class="fas fa-bell"></i></a>
         <a href="logout.php" style="float: right;"><i class="fas fa-sign-out-alt"></i></a>
         <a href="#" style="float: right;"><i class="fas fa-id-card"></i> <?php echo $_SESSION['cuser']['Username']; ?><span  style="color: #888; font-size: 10px;"> (<?php echo ucfirst($_SESSION['cuser']['UserType']); ?>)</span></a>
      </div>
   </nav>
   <div class="regform">
        <h1>Create Archive</h1>
        <form  name="registration" action="insert.php" method="post" id="myForm" enctype="multipart/form-data">
            <input class="reginput" type="text" name="ThesisTitle" placeholder="Title" required/>
            <input class="reginput" type="text" name="Authors" placeholder="Authors separated by Comma i.e (john doe, jean doe)" required/>
            <!-- <input class="reginput" type="text" name="College" placeholder="College" required/> -->
            <select class="reginput" id="College" name="College">
               <option value="CECS">CECS</option>
               <option value="CHRM">CHRM</option>
               <option value="COC">COC</option>
               <option value="CBAA">CBAA</option>
               <option value="CAS">CAS</option>
               <option value="CON">CON</option>
               <option value="CED">CED</option>
            </select>
            <textarea class="reginput" type="text" name="Thesisdesc" placeholder="Thesis Discussion"></textarea>
            <input class="reginput" type="text" name="Tags" placeholder="Tags" required/>
            <input class="reginput" type="number" name="Permission" placeholder="permission" required/>
            <input class="reginput" type="text" name="UploadDate" placeholder="Upload Date" id="mydate" onclick="dateTime()" required/>
            <input class="reginput" type="text" name="UploadBy" placeholder="Uploaded By" required/>
            <input class="reginput" type="file" name="myFile" placeholder="Thesis File" required/>
            <input type="submit" name="newSubmission" value="Add Archive" class="regsubmit"/>
        </form>
    </div>
</body>
</html>