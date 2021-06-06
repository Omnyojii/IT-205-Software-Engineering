<?php 
include "auth.php";
include "function.php";
$connect = connectdb();

    $sql = "SELECT * FROM inquiry";   
    if(isset($_POST['search'])){
        if(isset($_POST['taskOption']) ){
            $selectOption = mysqli_real_escape_string($connect, htmlspecialchars($_POST['taskOption']));
        }
        $searchInput = mysqli_real_escape_string($connect, htmlspecialchars($_POST['search']));
        $sql = "SELECT * FROM inquiry WHERE $selectOption ='$searchInput'";
    }
    $result = $connect->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>KingsWay Inn</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <!-- <link rel="alternate" href="https://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" type="application/atom+xml" title="Atom"> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600&family=Montserrat:ital,wght@0,100;1,100&family=Raleway:ital,wght@0,100;1,100&display=swap" rel="stylesheet">
    <script type="text/javascript">
      function deleteAccount(id, column){
        if(confirm("Are you sure you want to delete?")){
          window.location = 'delete.php?table=admin&column=adminID&id=' + id;
        }
      }
    </script>
</head>

<body>
    <section class="cnav menu col-12 col">
        <nav class="col-12 col">
            <ul class="col menuflat col-12 clinks6">
                <a href="index.php#Home" class="clogo" style="margin-left:6%;"><img class="logo" src="images/logo-inline.png" alt=""></a>
                <a href="reservations.php" class="c-button cbooking">Reservations</a>
                <a href="customers.php" class="c-button cbooking">Customers</a>
                <a href="inquiries.php" class="c-button cbooking">Inquiries</a>
                <a href="managerooms.php" class="c-button cbooking">Manage Rooms</a>
                <a href="createusers.php" class="c-button cbooking">Manage User</a>
                <a href="viewusers.php" class="c-button cbooking">View Users</a>
                <a href="logout.php" class="c-button cbooking">Logout</a>
            </ul>
        </nav>
    </section>
    <header class="col-12 col">
        <!-- <img src="images/room4.png" alt="profile" class="col-12 banner"> -->
        <div class="cite">
            <h1>Inquiries</h1>
        </div>
    </header>
	<section id="" class="col-12 col">
        <form action="" method="POST" class="searchform" style="">
            <input id="Gosearch" type="text" placeholder="Search.." name="search">
            <select name="taskOption" id="entityID">
                <option value="inquiry_id">by &nbsp;Inquiry ID</option>
                <option value="fullname">by &nbsp;Full Name</option>
                <option value="email">by &nbsp;Email</option>
                <option value="subject">by &nbsp;Subject</option>
                <option value="message">by &nbsp;Message</option>
            </select>
            <button class="searchbtn" type="submit" name="searchAccount"><i class="fa fa-search"></i></button>
        </form>
        <section class="table-container">
            <table id="customers">
                <thead>
                    <tr>
                        <th>Inquiry ID</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    if (isset($_POST['search']) && $_POST['search'] == ""){
                        $sql = "SELECT * FROM inquiry";
                        $query = mysqli_query($connect, $sql);
                        while($row = mysqli_fetch_array($query)){ ?>
                        <tr>
                            <td><?php echo $row['inquiry_id']; ?></td>
                            <td><?php echo $row['fullname']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['subject']; ?></td>
                            <td><?php echo $row['message']; ?></td>
                        <td><a href="#" onclick="javascript: deleteAccount(<?php echo $row['inquiry_id']; ?>)"><i class="fas fa-trash"></i></a></td>
                        </tr>
                <?php }} else {
                    while($row = mysqli_fetch_array($result)){ ?>
                        <tr>
                            <td><?php echo $row['inquiry_id']; ?></td>
                            <td><?php echo $row['fullname']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['subject']; ?></td>
                            <td><?php echo $row['message']; ?></td>
                        <td><a href="#" onclick="javascript: deleteAccount(<?php echo $row['inquiry_id']; ?>)"><i class="fas fa-trash"></i></a></td>
                        </tr>
                <?php }}?>
            </tbody>
            </table>
        </section>
    </section>
    <footer id="" class="col col-12">
        <p id="copyright ">&copy;<time datetime="2021-04-13 "><em>2021</time>, Kingsway Inn, Iligan. All rights reserved.</em></p>
    </footer>
</body>

</html>