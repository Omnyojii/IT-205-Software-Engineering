<?php
//include auth.php file on all secure pages
include "auth.php";
isSuperAdmin();
include "function.php";
$connect = connectdb();

    // $sql = "SELECT * FROM users";
    // $sql = "SELECT * FROM loginhistory";
    $sql = "SELECT loginhistory.login_id as Login_ID, users.Fullname as FullName, users.UserType as UserType, loginhistory.date_login as Date_Login, loginhistory.date_logout AS Date_Logout FROM loginhistory JOIN users ON loginhistory.user_id = users.UserID ORDER BY loginhistory.login_id";
    if(isset($_POST['search'])){
        if(isset($_POST['taskOption']) ){
            $selectOption = mysqli_real_escape_string($connect, htmlspecialchars($_POST['taskOption']));
        }
        $searchInput = mysqli_real_escape_string($connect, htmlspecialchars($_POST['search']));
        // $sql = "SELECT * FROM activitylog WHERE $selectOption ='$searchInput'";
        $sql = "SELECT loginhistory.login_id as Login_ID, users.Fullname as FullName, users.UserType as UserType, loginhistory.date_login as Date_Login, loginhistory.date_logout AS Date_Logout FROM loginhistory JOIN users ON loginhistory.user_id = users.UserID WHERE $selectOption ='$searchInput' ORDER BY loginhistory.login_id";
        // $sql = "SELECT * FROM thesisarchivebook WHERE $selectOption ='$searchInput' AND college='$checklist'";
    }
    $result = $connect->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Secured Page</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <script src="sort-table.js"></script>
    <script type="text/javascript">
      function deleteAccount(id){
        if(confirm("Are you sure you want to delete?")){
          window.location = 'deleteAccount.php?uid=' + id;
        }
      }
    </script>
</head>
<body>
    <nav>
      <div class="navbar">
         <a href="dashboard.php" class=""><i class="fa fa-fw fa-home"></i> Home</a> 
         <a href="archive.php" class=""><i class="fas fa-archive"></i> Archive</a>
         <?php
            if ($_SESSION['cuser']['UserType'] == 'admin' || $_SESSION['cuser']['UserType'] == 'superadmin' ) {
                ?>
                <a href="managearchive.php" class=""><i class="fas fa-folder-plus"></i> Manage Archive</a> 
                <?php
            }
            if ($_SESSION['cuser']['UserType'] == 'superadmin' ) {
                ?>
                <a href="manageaccount.php" class=""><i class="fas fa-user-plus"></i> Manage Account</a>
                <a href="view.php"><i class="fas fa-users"></i> View Accounts</a>
                <a href="activitylogs.php" class=""><i class="fas fa-id-card"></i>  Activity Logs</a>
                <a href="loginhistory.php" class="active" ><i class="fas fa-user-clock"></i> Login History</a>
                <a href="notification.php" class="" ><i class="fas fa-bell"></i> Login Request</a>
                <?php
            }
         ?>
         <a href="logout.php" style="float: right;">Logout <i class="fas fa-sign-out-alt"></i></a>
         <a href="#" style="float: right;"><i class="fas fa-id-badge"></i> <?php echo $_SESSION['cuser']['Username']; ?><span  style="color: #888; font-size: 10px;"> (<?php echo ucfirst($_SESSION['cuser']['UserType']); ?>)</span></a>
      </div>
    </nav>
    <section>
        <form action="" method="POST" class="searchform" style="max-width:85%">
            <input id="Gosearch" type="text" placeholder="Search.." name="search">
            <select name="taskOption" id="entityID">
                <option value="Login_ID">by -&nbsp;Login ID</option>
                <option value="FullName">by -&nbsp;Full Name</option>
                <option value="UserType">by -&nbsp;User Type</option>
                <option value="Date_Login">by -&nbsp;Date Login</option>
                <option value="Date_Logout">by -&nbsp;Date Logout</option>
            </select>
            <button class="searchbtn" type="submit" name="searchAccount"><i class="fa fa-search"></i></button>
        </form>
   </section>
   <section class="table-container">
        <table id="customers">
            <thead>
                <tr>
                    <th>Login ID</th>
                    <th>Full Name</th>
                    <th>User Type</th>
                    <th>Date Login</th>
                    <th>Date Logout</th>
                    <th style="text-align: center; width:3%;">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                    if (isset($_POST['search']) && !$_POST['search']){
                        $sql = "SELECT loginhistory.login_id as Login_ID, users.Fullname as FullName, users.UserType as UserType, loginhistory.date_login as Date_Login, loginhistory.date_logout AS Date_Logout FROM loginhistory JOIN users ON loginhistory.user_id = users.UserID ORDER BY loginhistory.login_id";
                        // $sql = "SELECT * FROM loginhistory";
                        $query = mysqli_query($connect, $sql);
                        while($row = mysqli_fetch_array($query)){ ?>
                        <tr>
                            <td><?php echo $row['Login_ID']; ?></td>
                            <td><?php echo $row['FullName']; ?></td>
                            <td><?php echo $row['UserType']; ?></td>
                            <td><?php echo $row['Date_Login']; ?></td>
                            <td><?php echo $row['Date_Logout']; ?></td>
                        <td style="text-align: center; width:3%;"><a title="delete" href="#" onclick="javascript: deleteAccount(<?php echo $row['login_id']; ?>)"><i class="fas fa-trash"></i></a></td>
                        </tr>
                 <?php }} else {
                    while($row = mysqli_fetch_array($result)){ ?>
                        <tr>
                            <td><?php echo $row['Login_ID']; ?></td>
                            <td><?php echo $row['FullName']  ; ?></td>
                            <td><?php echo $row['UserType']  ; ?></td>
                            <td><?php echo $row['Date_Login']; ?></td>
                            <td><?php echo $row['Date_Logout']; ?></td>
                        <td style="text-align: center; width:3%;"><a title="delete" href="#" onclick="javascript: deleteAccount(<?php echo $row['login_id']; ?>)"><i class="fas fa-trash"></i></a></td>
                        </tr>
                <?php }}?>
            </tbody>
        </table>
    </section>
</body>
</html>