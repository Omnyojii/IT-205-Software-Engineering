<?php
//include auth.php file on all secure pages
    include "auth.php";
    isSuperAdmin();
    include "function.php";

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
   <script type="text/javascript">
      function allowUser(id){
        if(confirm("Are you sure?")){
            window.location = 'allowuser.php?uid=' + id;
        }
      }
      function logout(id){

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
         <a href="dashboard.php" class=""><i class="fa fa-fw fa-home"></i> Home</a> 
         <a href="archive.php" class=""><i class="fas fa-archive"></i> Archive</a> 
         <a href="managearchive.php" class=""><i class="fas fa-folder-plus"></i> Manage Archive</a> 
         <a href="manageaccount.php" class=""><i class="fas fa-user-plus"></i> Manage Account</a>
         <a href="view.php" class=""><i class="fas fa-users"></i> View Accounts</a>
         <a href="activitylogs.php" class=""><i class="fas fa-id-card"></i>  Activity Logs</a>
         <a href="loginhistory.php" class="" ><i class="fas fa-user-clock"></i> Login History</a>
         <a href="notification.php" class="active" ><i class="fas fa-bell"></i> Login Request</a>
         <a href="logout.php" style="float: right;">Logout <i class="fas fa-sign-out-alt"></i></a>
         <a href="#" style="float: right;"><i class="fas fa-id-badge"></i> <?php echo $_SESSION['cuser']['Username']; ?><span  style="color: #888; font-size: 10px;"> (<?php echo ucfirst($_SESSION['cuser']['UserType']); ?>)</span></a>
      </div>
   </nav>
  
   <section class="table-container">
        <table id="customers">
            <thead>
                <tr>
                    <th>UserID</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>UserType</th>
                    <th>Permission</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                    $connect = connectdb();
                    $sql = "SELECT * FROM users WHERE userType = 'user'";
                    // $sql = "SELECT id, firstname, lastname FROM user";
                    $query = mysqli_query($connect, $sql);
                    if ($query->num_rows > 0){
                        while($row = mysqli_fetch_array($query)){ ?>
                            <tr>
                                <td><?php echo $row['UserID']; ?></td>
                                <td><?php echo $row['Username']; ?></td>
                                <td><?php echo $row['Password']; ?></td>
                                <td><?php echo $row['UserType']; ?></td>
                                <td><?php echo $row['Perms']; ?></td>
                                <td><input value="Allow" type="submit" name="allowUser" onclick="javascript: allowUser(<?php echo $row['UserID']; ?>)"/></td>
                            </tr>
                    <?php }} else {
                        echo "0 results";
                    }?>
            </tbody>
        </table>
    </section>
</body>
</html>