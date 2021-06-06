<?php 
include "function.php";

$connect = connectdb();

if(isset($_POST['newenrollment'])){

	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$middle_name = $_POST['middle_name'];
	$birthdate = $_POST['birthdate'] ? date('Y-m-d H:i:s', strtotime($_POST['birthdate'])) : null;
	$email = $_POST['email'];
	$contact = $_POST['contact'];
	$address = $_POST['address'];
	$course_name = $_POST['course_name'];
	$hours = $_POST['hours'];

	$sql = "INSERT INTO student (first_name, middle_name, last_name, birthdate, email, address, contact) VALUES ('$first_name', '$middle_name', '$last_name', '$birthdate', '$email', '$address', '$contact')";

	if ($connect->query($sql) === TRUE) {
	    $student_id = $connect->insert_id;
	    
	    $sql2 = "SELECT id FROM course WHERE name = '$course_name' AND hours = $hours";

	    $query = mysqli_query($connect, $sql2);
	    $row= mysqli_fetch_assoc($query);

	    $course_id = $row['id'];
	    $sql3 = "INSERT INTO enrollment (course_id, student_id) VALUES ($course_id, $student_id)";
	    var_dump($sql3);
	    if ($connect->query($sql3) === TRUE) {
	    	header("location: dashboard.php");
	    }

	} else {
	    echo "Error: " . $sql . "<br>" . $connect->error;
	    echo "<br><a href='dashboard.php'>Back to Dashboard</a>";
	}

}
?>