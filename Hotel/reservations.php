<?php 
include "auth.php";
include "function.php";
$connect = connectdb();

    $sql = "SELECT reservation.reservation_id as resID, reservation.checkIn as checkIn , reservation.checkOut as checkOut, reservation.adult as adult, reservation.kids as kids, reservation.room_cost as roomcost, reservation.request as request, customer.customer_id as cust_id, customer.firstname fname, customer.lastname as lname, customer.email as email, customer.phonenum as phone, customer.country as country FROM reservation JOIN customer ON reservation.customer_id = customer.customer_id";
    if(isset($_POST['search'])){
        if(isset($_POST['taskOption']) ){
            $selectOption = mysqli_real_escape_string($connect, htmlspecialchars($_POST['taskOption']));
        }
        $searchInput = mysqli_real_escape_string($connect, htmlspecialchars($_POST['search']));
        $sql = "SELECT * FROM reservation WHERE $selectOption ='$searchInput'";
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
      function deleteAccount(id, column){
        if(confirm("Are you sure you want to delete?")){
          window.location = "delete.php?table=reservation&column=reservation_id&id=" + id;
        }
      }
      function editreservation(uid, customerid,  kids,  adult, roomcost){
    //   function editAccount(id, roomcost){
            // window.location = 'editreservation.php?table=reservation&column=reservation_id&id=' + id;
          window.location = 'editreservation.php?uid=' + uid + '&adult=' + adult + '&kids=' + kids + '&roomcost=' + roomcost + '&customerid=' + customerid;
        //   window.location = 'editreservation.php?id=' + id;
        //   window.location = "editreservation.php?table=reservation&column=reservation_id&id=" + id + "&customerid=" + customerid;
        // $.post('editreservation.php', { id: id, customerid: customerid, kids:kids, adult:adult, roomcost:roomcost, }, function(result) {
        //     alert('successfully posted key1=value1&key2=value2 to foo.php');
        // });
        // $.post( "editreservation.php", { uid: uid, customerid: customerid, kids:kids, adult:adult, roomcost:roomcost  } );
      }
      function accommodate(id){
          window.location = 'managerooms.php?id=' + id;
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
            <h1>Reservations</h1>
        </div>
    </header>
    <section id="" class="col-12 col">
        <form action="" method="POST" class="searchform" style="">
            <input id="Gosearch" type="text" placeholder="Search.." name="search">
            <select name="taskOption" id="entityID">
                <option value="reservation_id">by &nbsp;User ID</option>
                <option value="checkIn">by &nbsp;checkIn</option>
                <option value="checkOut">by &nbsp;checkOut</option>
                <option value="adult">by &nbsp;adult</option>
                <option value="kids">by &nbsp;kids</option>
                <option value="room_cost">by &nbsp;room_cost</option>
                <option value="request">by &nbsp;request</option>
            </select>
            <button class="searchbtn" type="submit" name="searchAccount"><i class="fa fa-search"></i></button>
        </form>
        <section class="table-container">
            <table id="customers">
                <thead>
                    <tr>
                        <th style="width:3%;">ID</th>
                        <th>checkIn</th>
                        <th>checkOut</th>
                        <th style="width:2.8%;">adult</th>
                        <th style="width:2.8%;">kids</th>
                        <th style="width:4.5%;">room cost</th>
                        <!-- <th style="width:4.5%;">room cost</th> -->
                        <th>request</th>
                        <th style="width:5.3%;">Customer ID</th>
                        <th>firstname</th>
                        <th>lastname</th>
                        <th>email</th>
                        <th style="width:6%;">phonenum</th>
                        <th style="width:5%;">country</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    if (isset($_POST['search']) && $_POST['search'] == ""){
                        $sql = "SELECT reservation.reservation_id as resID, reservation.checkIn as checkIn , reservation.checkOut as checkOut, reservation.adult as adult, reservation.kids as kids, reservation.room_cost as roomcost, reservation.request as request, customer.customer_id as cust_id, customer.firstname fname, customer.lastname as lname, customer.email as email, customer.phonenum as phone, customer.country as country FROM reservation JOIN customer ON reservation.customer_id = customer.customer_id";
                        $query = mysqli_query($connect, $sql);
                        while($row = mysqli_fetch_array($query)){ ?>
                        <tr>
                            <td style="width:3%;"><?php echo $row['resID']; ?></td>
                            <td><?php echo $row['checkIn']; ?></td>
                            <td><?php echo $row['checkOut']; ?></td>
                            <td style="width:4%;"><?php echo $row['adult']; ?></td>
                            <td style="width:4%;"><?php echo $row['kids']; ?></td>
                            <td style="width:4.5%;"><?php echo $row['roomcost']; ?></td>
                            <td><?php echo $row['request']; ?></td>
                            <td style="width:4.5%;"><?php echo $row['cust_id']; ?></td>
                            <td><?php echo $row['fname']; ?></td>
                            <td><?php echo $row['lname']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td style="width:6%;"><?php echo $row['phone']; ?></td>
                            <td style="width:5%;"><?php echo $row['country']; ?></td>
                            <td>
                                <!-- <a title="update" href="#" onclick="javascript: editreservation(<?php echo $row['resID']; ?>,<?php echo $row['adult']; ?>,<?php echo $row['kids']; ?>,<?php echo $row['roomcost']; ?>,<?php echo $row['request']; ?>,<?php echo $row['cust_id']; ?>)"><i class="fas fa-edit"></i></a>  -->
                                <a title="update" href="#" onclick="javascript: editreservation(<?php echo $row['resID']; ?>,<?php echo $row['cust_id']; ?>,<?php echo $row['kids']; ?>,<?php echo $row['adult']; ?>,<?php echo $row['roomcost']; ?>   )"><i class="fas fa-edit"></i></a> 
                                <a title="delete" href="#" onclick="javascript: deleteAccount(<?php echo $row['resID']; ?>)"><i class="fas fa-trash"></i></a>
                                <a title="accommodation" href="#" onclick="javascript: accommodate(<?php echo $row['resID']; ?>)"><i class="fas fa-door-open"></i></a>
                            </td>
                        </tr>
                <?php }} else {
                    while($row = mysqli_fetch_array($result)){ ?>
                        <tr>
                            <td style="width:3%;"><?php echo $row['resID']; ?></td>
                            <td><?php echo $row['checkIn']; ?></td>
                            <td><?php echo $row['checkOut']; ?></td>
                            <td style="width:3%;"><?php echo $row['adult']; ?></td>
                            <td style="width:3%;"><?php echo $row['kids']; ?></td>
                            <td style="width:4.5%;"><?php echo $row['roomcost']; ?></td>
                            <td><?php echo $row['request']; ?></td>
                            <td><?php echo $row['cust_id']; ?></td>
                            <td><?php echo $row['fname']; ?></td>
                            <td><?php echo $row['lname']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td style="width:6%;"><?php echo $row['phone']; ?></td>
                            <td style="width:5%;"><?php echo $row['country']; ?></td>
                            <td>
                                <!-- <a title="update" href="#" onclick="javascript: editreservation(<?php echo $row['resID']; ?>,<?php echo $row['adult']; ?>,<?php echo $row['kids']; ?>,<?php echo $row['roomcost']; ?>,<?php echo $row['request']; ?>,<?php echo $row['cust_id']; ?>)"><i class="fas fa-edit"></i></a>  -->
                                <a title="update" href="#" onclick="javascript: editreservation(<?php echo $row['resID']; ?>,<?php echo $row['cust_id']; ?>,<?php echo $row['kids']; ?>,<?php echo $row['adult']; ?>,<?php echo $row['roomcost']; ?>)"><i class="fas fa-edit"></i></a> 
                                <a title="delete" href="#" onclick="javascript: deleteAccount(<?php echo $row['resID']; ?>)"><i class="fas fa-trash"></i></a>
                                <a title="accommodation" href="#" onclick="javascript: accommodate(<?php echo $row['resID']; ?>)"><i class="fas fa-door-open"></i></a>
                            </td>
                        </tr>
                <?php }}?>
            </tbody>
            </table>
        </section>
    </section>
    <header class="chead col-12">
    </header>
    <footer id="" class="col col-12">
        <p id="copyright ">&copy;<time datetime="2021-04-13 "><em>2021</time>, Kingsway Inn, Iligan. All rights reserved.</em></p>
    </footer>
</body>

</html>