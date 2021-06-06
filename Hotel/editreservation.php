<?php
    include "auth.php";
    include "function.php";
    $connect = connectdb();

    $newID = $_GET['uid'];
    $adultG = $_GET['adult'];
    $kidsG = $_GET['kids'];
    $roomcostG = $_GET['roomcost'];
    $customeridG = $_GET['customerid'];

    if (isset($_POST['newReservation'])){
        $id = $_POST['id'];
        $checkIn = $_POST['checkIn'];
        $checkOut = $_POST['checkOut'];
        $adult = $_POST['adult'];
        $kids = $_POST['kids'];
        $roomcost = $_POST['roomcost'];
        $customerid = $_POST['customerid'];
        $request = $_POST['request'];
        $newReservation = $_POST['newReservation'];

        $sql = "UPDATE reservation SET checkIn = '$checkIn', checkOut = '$checkOut', adult = '$adult', kids = '$kids', room_cost = '$roomcost', request = '$request', customer_id = '$customerid' WHERE reservation_id = '$id'";

        $query = mysqli_query($connect, $sql);

        if ($query) {
            $connect->close();
            echo "<script>alert('Successfully updated reservation');window.location.href=document.referrer;</script>";
            die();
        } else {
            $connect->close();
            echo "<script type='text/javascript'>alert('Server is busy!');window.location.href=document.referrer;</script>";
        }

        $connect->close();
    }

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
    <script src="js/index.js"></script>
    <style>

    </style>
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
            <h1>Manage User</h1>
        </div>
    </header>
	<section class="col-12 col">
        <article class=" col-12 carticle">
            <div class="divcon">
                <div class="container col-4 card2">
                    <form action="" method="post" id="myForm">
                        <label for="id">Reservation ID</label>
                        <input name="id" id="id" class="datebox input-field" type="text" placeholder="id" value="<?php echo $newID; ?>"/>
                        <h3>Booking Information</h3>
                        <label for="checkIn">Check In</label>
                        <!-- <input name="checkIn" id="checkIn" class="datebox input-field" type="datetime-local" placeholder="Check-In" > -->
                        <input name="checkIn" id="checkIn" class="datebox input-field" type="text" onfocus="(this.type='datetime-local')" onblur="(this.type='text')" placeholder="Check-In" required>

                        <label for="checkOut">Check Out</label>
                        <input name="checkOut" id="checkOut" class="datebox input-field" type="text" onfocus="(this.type='datetime-local')" onblur="(this.type='text')" placeholder="Check-In" required>

                        <label for="adult">Adults</label>
                        <input name="adult" id="adult" class="adult input-field" type="number" placeholder="Adults" min="1" max="1" value="<?php echo $adultG; ?>" required>

                        <label for="kids">Kids</label>
                        <input name="kids"  id="kids" class="kids input-field" type="number" placeholder="Kids (max 2)" min="0" max="2" value="<?php echo $kidsG; ?>" required>

                        <label for="roomcost">Room Cost</label>
                        <input name="roomcost" id="roomtype" class="roomtype input-field" type="text" placeholder="" value="<?php echo $roomcostG; ?>" required>

                        <label for="request">Special Request</label>
                        <textarea name="request" id="request" class="input-field" cols="67" rows="5"></textarea>

                        <h3>Customer ID</h3>

                        <label for="customerid">Room Cost</label>
                        <input name="customerid" id="customerid" class="input-field" type="text" placeholder="" value="<?php echo $customeridG; ?>" required>

                        <p>• By completing this booking I acknowledge I have read and accepted the Property Policies.</p>

                        <input type="submit" name="newReservation" value="Apply for Reservation" class="btn info">
                    </form>
                </div>
            </div>
        </article>
    </section>
    <footer id="" class="col col-12">
        <p id="copyright ">&copy;<time datetime="2021-04-13 "><em>2021</time>, Kingsway Inn, Iligan. All rights reserved.</em></p>
    </footer>
</body>

</html>