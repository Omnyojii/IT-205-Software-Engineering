<?php
//include auth.php file on all secure pages
include "auth.php";
isSuperAdmin();
include "function.php";
$connect = connectdb();

    // $sql = "SELECT * FROM users";
    $sql = "SELECT * FROM users";
    if(isset($_POST['search'])){
        if(isset($_POST['taskOption']) ){
            $selectOption = mysqli_real_escape_string($connect, htmlspecialchars($_POST['taskOption']));
        }
        $searchInput = mysqli_real_escape_string($connect, htmlspecialchars($_POST['search']));
        $sql = "SELECT * FROM users WHERE $selectOption ='$searchInput'";
        // $sql = "SELECT * FROM thesisarchivebook WHERE $selectOption ='$searchInput' AND college='$checklist'";
    }
    $result = $connect->query($sql);
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
   <script src="sort-table.js"></script>
   <script type="text/javascript">
      function deleteAccount(id){
        if(confirm("Are you sure you want to delete?")){
          window.location = 'deleteAccount.php?uid=' + id;
        }
      }
      function editAccount(id){
          window.location = 'manageaccount.php?id=' + id;
      }
    </script>
</head>
<body>
   <nav>
      <div class="navbar">
         <a href="dashboard.php" class=""><i class="fa fa-fw fa-home"></i> Home</a> 
         <a href="archive.php" class=""><i class="fas fa-archive"></i> Archive</a> 
         <a href="managearchive.php" class=""><i class="fas fa-folder-plus"></i> Manage Archive</a> 
         <a href="manageaccount.php" class=""><i class="fas fa-user-plus"></i> Manage Account</a>
         <a href="view.php" class="active"><i class="fas fa-users"></i> View Accounts</a>
         <a href="activitylogs.php" class=""><i class="fas fa-id-card"></i>  Activity Logs</a>
         <a href="loginhistory.php" class="" ><i class="fas fa-user-clock"></i> Login History</a>
         <a href="notification.php" class="" ><i class="fas fa-bell"></i> Login Request</a>
         <a href="logout.php" style="float: right;">Logout <i class="fas fa-sign-out-alt"></i></a>
         <a href="#" style="float: right;"><i class="fas fa-id-badge"></i> <?php echo $_SESSION['cuser']['Username']; ?><span  style="color: #888; font-size: 10px;"> (<?php echo ucfirst($_SESSION['cuser']['UserType']); ?>)</span></a>
      </div>
   </nav>
   <section>
        <form action="" method="POST" class="searchform" style="max-width:85%">
            <input id="Gosearch" type="text" placeholder="Search.." name="search">
            <select name="taskOption" id="entityID">
                <option value="UserID">by &nbsp;User ID</option>
                <option value="Username">by &nbsp;Username</option>
                <option value="Fullname">by &nbsp;Full name</option>
                <option value="College">by &nbsp;College</option>
                <option value="UserType">by &nbsp;User Type</option>
                <option value="Perms">by &nbsp;Permission</option>
            </select>
            <button class="searchbtn" type="submit" name="searchAccount"><i class="fa fa-search"></i></button>
        </form>
   </section>
   <section class="table-container">
        <table id="customers">
            <thead>
                <tr>
                    <th>UserID</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Fullname</th>
                    <th>College</th>
                    <th>UserType</th>
                    <th>Permission</th>
                    <th style="text-align: center; width:3%;">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                    if (isset($_POST['search']) && !$_POST['search']){
                        $sql = "SELECT * FROM users";
                        $query = mysqli_query($connect, $sql);
                        while($row = mysqli_fetch_array($query)){ ?>
                        <tr>
                            <td><?php echo $row['UserID']; ?></td>
                            <td><?php echo $row['Username']; ?></td>
                            <td><?php echo $row['Password']; ?></td>
                            <td><?php echo $row['Fullname']; ?></td>
                            <td><?php echo $row['College']; ?></td>
                            <td><?php echo $row['UserType']; ?></td>
                            <td><?php echo $row['Perms']; ?></td>
                            <td style="text-align: center; width:3%;">
                                <a title="update" href="#" onclick="javascript: editAccount(<?php echo $row['UserID']; ?>)"><i class="fas fa-edit"></i></a> 
                                <a title="delete" href="#" onclick="javascript: deleteAccount(<?php echo $row['UserID']; ?>)"></a><i class="fas fa-trash"></i>
                            </td>
                        </tr>
                <?php }} else {
                    while($row = mysqli_fetch_array($result)){ ?>
                        <tr>
                            <td><?php echo $row['UserID']; ?></td>
                            <td><?php echo $row['Username']; ?></td>
                            <td><?php echo $row['Password']; ?></td>
                            <td><?php echo $row['Fullname']; ?></td>
                            <td><?php echo $row['College']; ?></td>
                            <td><?php echo $row['UserType']; ?></td>
                            <td><?php echo $row['Perms']; ?></td>
                            <td style="text-align: center; width:3%;">
                                <a title="update" href="#" onclick="javascript: editAccount(<?php echo $row['UserID']; ?>)"><i class="fas fa-edit"></i></a> 
                                <a title="delete" href="#" onclick="javascript: deleteAccount(<?php echo $row['UserID']; ?>)"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                <?php }}?>
            </tbody>
        </table>
    </section>
</body>
</html>