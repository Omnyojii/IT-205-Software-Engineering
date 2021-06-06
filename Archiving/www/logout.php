<?PHP
    session_start();
    include 'function.php';
    $conn = connectdb();

    // session_start();
    // session_destroy();
    // header("Location: index.php");
	date_default_timezone_set('Asia/Manila');

    $dl = date("Y-m-d H:i:s");
    $historyID = $_SESSION['loginhistory'];
    $userOutID = $_SESSION['cuser']['UserID'];

    // ------------------RESET USER PERMISSION----------------
    if ($_SESSION['cuser']['UserType'] == 'user' ) {
        $sql = "UPDATE users SET Perms = '0' WHERE UserID = '$userOutID' ";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            $conn->close();
            echo "<script>alert('User Logout');window.location.href='index.php';</script>";
        }
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        header("Location: index.php");
    }

    islogout($dl, $historyID); //FUNCTION CALL
    
    session_destroy();
    header("Location: index.php");


    //--------------RECORD LOGOUT--------------------------
    function islogout($dl, $historyID){
        $conn = connectdb();

        $sql = "UPDATE loginhistory SET date_logout = '$dl' WHERE login_id = '$historyID'";

        if ($conn->query($sql) === TRUE)  {
            echo "<script>alert('Success');</script>";
            // die();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            // die();
        }
        $conn->close();
    }

?>
