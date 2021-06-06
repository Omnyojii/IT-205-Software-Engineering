<!DOCTYPE html>
<html>
<head>
    <title>View</title>
    <link href="css/style.css" rel="stylesheet" />
</head>
<body>

<div class="topnav">
    <span class="otto">UPDATE</span>
    <a href="index.php">HOME</a>
    <a href="view.php">VIEW</a>
    <a href="update.php" class="active">EDIT</a>
    <a href="delete2.php">DELETE</a>
</div>

<?php
    include 'connection.php';
    $conn = connectdb();

    $newID = $_GET['id'];

    $id = $_POST['id'];
    $fn = $_POST['firstname'];
    $ln = $_POST['lastname'];
    $confirm = $_POST['submit'];

    if($confirm){
        $sql = "UPDATE user SET  firstname = '$fn', lastname = '$ln' WHERE id = '$id'";

        $query = mysqli_query($conn, $sql);

        if ($query) {
            echo "<script>alert('New record created successfully');window.location.href='update.php';</script>";
            die();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    
    $conn->close();
?>


<div class="container">
    <h1>Update Data</h1>
    <form action="" method="POST">
            <input type="text" name="id" placeholder="id" value="<?php echo $newID; ?>"/>
            <input type="text" name="firstname" placeholder="First Name"/>
            <input type="text" name="lastname" placeholder="Last Name"/>
            <input type="submit" name="submit" onclick="return confirm('Are you sure?')"/>
    </form>
</div>
</body>
</html>
