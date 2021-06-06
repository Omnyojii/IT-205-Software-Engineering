<?php 
  include "function.php";
  $connect = connectdb();
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
    
	<h1 class="h2">Enroll New Student</h1>
	<form action="newEnrollmentInsert.php" method="post">
		<h4>Student Profile</h4>
		<div class="form-group">
			<label>First Name</label>
			<input class="form-control" type="text" name="first_name" />
		</div>
		<div class="form-group">
			<label>Middle Name</label>
			<input class="form-control" type="text" name="middle_name" />
		</div>
		<div class="form-group">
			<label>Last Name</label>
			<input class="form-control" type="text" name="last_name" />
		</div>
		<div class="form-group">
			<label>Gender</label>
			<select class="form-control" name="gender">
				<option value="male">Male</option>
				<option value="female">Female</option>
			</select>
		</div>
		<div class="form-group">
			<label>Birth Date</label>
			<input class="form-control" type="text" placeholder="dd/mm/YYYY" name="birthdate" />
		</div>
		<div class="form-group">
			<label>Email Address</label>
			<input class="form-control" type="text" name="email" />
		</div>
		<div class="form-group">
			<label>Contact</label>
			<input class="form-control" type="text" name="contact" />
		</div>
		<div class="form-group">
			<label>Address</label>
			<input class="form-control" type="text" name="address" />
		</div>
		<h4>Enrollment Course</h4>
		<div class="form-group">
			<label>Course</label>
			<select class="form-control" name="course_name">
				<?php
					$sql = "SELECT name, id FROM course GROUP BY name";
					$query = mysqli_query($connect, $sql);
					while($row = mysqli_fetch_array($query)){ ?>
						<option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
				<?php } ?>
			</select>
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
		<button type="submit" class="btn btn-primary" name="newenrollment">Submit</button>
	</form>
    </main>
  </div>
</div>
</body>
</html>
