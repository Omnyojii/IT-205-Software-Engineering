<?php
    include "auth.php";
    isSuperAdmin();

    $newID = $_GET['id'];

    



?>


<html>
<head>
    <meta charset="utf-8">
    <title>Registration</title>
    <link rel="stylesheet" href="css/style.css" />
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
   <script src="script.js"></script>
</head>
<body>
    <nav>
      <div class="navbar">
         <a href="dashboard.php" class=""><i class="fa fa-fw fa-home"></i> Home</a> 
         <a href="archive.php" class="" ><i class="fas fa-archive"></i> Archive</a> 
         <a href="managearchive.php" class=""><i class="fas fa-folder-plus"></i> Manage Archive</a> 
         <a href="manageaccount.php" class="active"><i class="fas fa-user-plus"></i> Manage Account</a>
         <a href="view.php" class=""><i class="fas fa-users"></i> View Accounts</a>
         <a href="activitylogs.php" class=""><i class="fas fa-id-card"></i>  Activity Logs</a>
         <a href="loginhistory.php" class="" ><i class="fas fa-user-clock"></i> Login History</a>
         <a href="notification.php" class="" ><i class="fas fa-bell"></i> Login Request</a>
         <a href="logout.php" style="float: right;">Logout <i class="fas fa-sign-out-alt"></i> </a>
         <a href="#" style="float: right;"><i class="fas fa-id-badge"></i> <?php echo $_SESSION['cuser']['Username']; ?><span  style="color: #888; font-size: 10px;"> (<?php echo ucfirst($_SESSION['cuser']['UserType']); ?>)</span></a>
      </div>
    </nav>
    <section class="grid-container">
      <div class="regform">
         <h1>Create Account</h1>
         <form  name="registration" action="insertacc.php" method="post" id="myForm">
            <input class="reginput" type="text" name="uName" placeholder="Username" required/>
            <input class="reginput" id="password" type="password" name="uPass" placeholder="Password" required/>
            <div class="regcheck">
                <input type="checkbox" onclick="togglePass()" class="">Show Password 
            </div>
            <input class="reginput" type="text" name="fullname" placeholder="Full Name" required/>
            <select class="reginput" name="college">
                <option value="CECS">CECS</option>
                <option value="CHRM">CHRM</option>
                <option value="COC">COC</option>
                <option value="CBAA">CBAA</option>
                <option value="CAS">CAS</option>
                <option value="CON">CON</option>
                <option value="CED">CED</option>
            </select>
            <select class="reginput" name="uType">
                <option value="user">User</option>
                <option value="dean">Dean</option>
                <option value="admin">Admin</option>
            </select>
            <input class="reginput" type="number" name="uPerms" placeholder="permission" min="1" max="3" required/>
            <input type="submit" name="newAccount" value="Register" class="regsubmit"/>
        </form>
      </div>
      <div class="regform">
         <h1>Update Account</h1>
         <form  name="updating" action="updateacc.php" method="post" id="myForm" enctype="multipart/form-data">
            <input class="reginput" type="text" name="userID" placeholder="Update by ID" value="<?php echo $newID?>" required/>
            <input class="reginput" type="text" name="uName" placeholder="Username" required/>
            <input class="reginput" id="password" type="password" name="uPass" placeholder="Password" required/>
            <div class="regcheck">
                <input type="checkbox" onclick="togglePass()" class="">Show Password 
            </div>
            <input class="reginput" type="text" name="fullname" placeholder="Full Name" required/>
            <select class="reginput" name="college">
                <option value="CECS">CECS</option>
                <option value="CHRM">CHRM</option>
                <option value="COC">COC</option>
                <option value="CBAA">CBAA</option>
                <option value="CAS">CAS</option>
                <option value="CON">CON</option>
                <option value="CED">CED</option>
            </select>
            <select class="reginput" name="uType">
                <option value="user">User</option>
                <option value="dean">Dean</option>
                <option value="admin">Admin</option>
            </select>
            <input class="reginput" type="number" name="uPerms" placeholder="permission" min="1" max="3" required/>
            <input type="submit" name="updateAccount" value="UpdateAccount" class="regsubmit"/>
         </form>
      </div>
    </section>
</body>
</html>