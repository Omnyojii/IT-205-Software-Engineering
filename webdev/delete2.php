<!DOCTYPE html>
<html>
<head>
    <title>View</title>
    <link href="css/style.css" rel="stylesheet" />
</head>
<body>

<div class="topnav">
    <span class="otto">DELETE</span>
    <a href="index.php">HOME</a>
    <a href="view.php">VIEW</a>
    <a href="update.php">EDIT</a>
    <a href="delete2.php" class="active">DELETE</a>
</div>

<?php
    include 'connection.php';
    $conn = connectdb();

	$id = $_POST['id'];
    $fn = $_POST['firstname'];
    $ln = $_POST['lastname'];
	$confirm = $_POST['submit'];

	if($confirm){
		$sql = "DELETE FROM user WHERE id = '$id' OR firstname = '$fn' OR lastname = '$ln' ";

		$query = mysqli_query($conn, $sql);

		if ($query) {
			// header('Location: view.php');
			echo "<script>alert('Record deleted successfully');window.location.href='view.php';</script>";
			die();
		}
		else {
			echo "Error: " . $query . "<br>" . $conn->error;
		}
	}

?>


<div class="container">
	<h1>DELETE DATA</h1>
    <form action="" method="POST">
			<label for="id"></label>
            <input type="text" name="id" placeholder="id" required/>
            <input type="submit" name="submit" onclick="return confirm('Are you sure?')"/>
    </form>
	<form action="" method="POST">
			<label for="firstname"></label>
            <input type="text" name="firstname" placeholder="firstname" required/>
            <input type="submit" name="submit" onclick="return confirm('Are you sure?')"/>
    </form>
	<form action="" method="POST">
			<label for="lastname"></label>
            <input type="text" name="lastname" placeholder="lastname" required/>
            <input type="submit" name="submit" onclick="return confirm('Are you sure?')"/>
    </form>
</div>
</body>
</html>
