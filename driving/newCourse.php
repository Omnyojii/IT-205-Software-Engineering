<?php 
  include "function.php";
  $connect = connectdb();

  if (isset( $_SESSION['login'] ) ) {
    // Grab user data from the database using the user_id
    // Let them access the "logged in only" pages
  } else {
      // Redirect them to the login page
      header("Location: index.php");
  }

  if(isset($_POST['newcourse'])){

    $course_id = $_POST['id'];
  	$name = $_POST['name'];
  	$hours = $_POST['hours'];
  	$price = $_POST['price'];

  	$data = array(
  		'name' => $name, 
  		'hours' => $hours, 
  		'price' => $price, 
  	);

  	$add = insert('course', $data);

    $sql2 = "INSERT INTO enrollment(course_id,hours,price) VALUES ('$course_id','$hours','$price')";

  	if($add){
  		header("location: courses.php");
  	}

  }
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>New Course</title>
	<link rel="stylesheet" type="text/css" href="dashboard.css">
    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/dashboard/"> -->


    <!-- Bootstrap core CSS -->
<link href="/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <!-- <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Dashboard</a> -->
  <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="logout.php">Sign out</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
              <span data-feather="file"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="student.php">
              <span data-feather="file"></span>
              Students
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="courses.php">
              <span data-feather="file"></span>
              Courses
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="users.php">
              <span data-feather="file"></span>
              Users
            </a>
          </li>
        </ul>
      </div>
    </nav>
  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	<h1 class="h2">Courses</h1>
	<form action="newCourse.php" method="post">
		<div class="form-group">
			<label>Name</label>
			<input class="form-control" type="text" name="name" />
		</div>
		<div class="form-group">
			<label>Hours</label>
			<select class="form-control" name="hours">
				<option value="5">5 Hours</option>
				<option value="7">7 Hours</option>
				<option value="10">10 Hours</option>
				<option value="15">15 Hours</option>
				<option value="20">20 Hours</option>
				<option value="30">30 Hours</option>
			</select>
		</div>
		<div class="form-group">
			<label>Price</label>
			<input class="form-control" type="text" name="price" />
		</div>
		<button type="submit" class="btn btn-primary" name="newcourse">Submit</button>
	</form>
    </main>
  </div>
</div>
</body>
</html>
