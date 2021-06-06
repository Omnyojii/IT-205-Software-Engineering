<?php
include "function.php";
$connect = connectdb();
// If form submitted, insert values into the database.
// mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
// error_reporting(0);
// error_reporting(E_ERROR | E_WARNING | E_PARSE);
// ini_set('display_errors', 'Off');
error_reporting(E_ERROR | E_WARNING | E_PARSE);


if (isset($_POST['newAccount'])){
    $username = $_POST['uName'];
	$password = $_POST['uPass'];
    $usertype = $_POST['uType'];
	$perms = $_POST['uPerms'];

    $data = array(
        'username' => $username,
        'password' => $password,
        'usertype' => $usertype,
        'perms' => $perms,
    );

    // if($usertype === "user"){
    //     $add = insert('user', $data);
    // }
    // else if($usertype === "dean"){
    //     $add = insert('dean', $data);
    // }
    // error_reporting(0);

        // $mysql_get_users = mysql_query("SELECT * FROM admin where username='$username'");
    // $duplicate = mysqli_query($connect,"SELECT * FROM admin WHERE username='$user_name' ");

    
    try {
        insert('admin', $data);
        echo "<script type='text/javascript'>alert('username successfully registered');</script>";
        // echo "<script type='text/javascript'>window.location = 'registration.php';</script>";
        // $query = mysqli_query($link, "insert into users  (username, first_name, last_name, gender) values ('codeAddictz', 'Dave', 'Pepper', 'Male')");
    } catch (mysqli_sql_exception $e) {
        echo "MySQLi Error Code: " . $e->getCode() . "<br />";
        echo "Exception Msg: " . $e->getMessage();
        echo "<script type='text/javascript'>alert('username already exists');</script>";
        // echo "<script type='text/javascript'>window.location = 'registration.php';</script>";
        // exit; // exit and close connection.
    }

    // if (mysqli_num_rows($duplicate)>0){
    //     echo "<script type='text/javascript'>alert('username already exists');</script>";
    //     echo "<script type='text/javascript'>window.location = 'registration.php';</script>";
    // }
    // else{
        // if($usertype == "admin"){
            // $add = insert('admin', $data);
            // echo "<script type='text/javascript'>alert('username successfully registered');</script>";
            // echo "<script type='text/javascript'>window.location = 'registration.php';</script>";
        // }

        // if($add){ 
            // echo "<script type='text/javascript'>alert('$username');</script>";
            // header("location: registration.php?message=Registration Successful"); 
        // }else {
        //     echo "<script>alert('An error occured!');</scipt>";
        // }
    // }
}
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
         <a class="" href="dashboard.php"><i class="fa fa-fw fa-home"></i> Home</a> 
         <a href="archive.php"><i class="fas fa-archive"></i> Archive</a> 
         <a href="welcome.php"><i class="fas fa-user-cog"></i> Admin</a> 
         <a href="registration.php" class="active"><i class="fas fa-user-plus"></i> Create Account</a> 
         <!-- <a href="https://www.smciligan.edu.ph/"><i class="fab fa-facebook-square"></i> SMC</a>  -->
         <a href="#" class="notification" >
            <span><i class="fas fa-bell"></i></span>
            <span class="badge">3</span>
         </a>
         <a href="logout.php" style="float: right;"><i class="fas fa-sign-out-alt"></i></a>
      </div>
    </nav>
    <div class="form">
        <h1>Registration</h1>
        <form  name="registration" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id="myForm">
            <input type="text" name="uName" placeholder="Username" required/>
            <input id="password" type="password" name="uPass" placeholder="Password" required/>
            <select name="uType">
                <option value="user">User</option>
                <option value="dean">Dean</option>
                <option value="admin">Admin</option>
            </select>
            <input type="number" name="uPerms" placeholder="permission" required/>
            <input type="submit" name="newAccount" value="Register" />
        </form>
        <div class="col-6" style="margin-left: 180px;">
            <input type="checkbox" onclick="togglePass()" class="">Show Password
         </div>
    </div>
</body>
</html>