<?php
    // include "auth.php";
    session_start();
    include "function.php";
    $reservation = $_SESSION['reservation'];
    $connect = connectdb();

    $sql = "SELECT * FROM reservation WHERE reservation_id = '$reservation'";

    $query = mysqli_query($connect, $sql);

    while($row = mysqli_fetch_array($query)){
        $checkIn = $row["checkIn"];
        $checkOut = $row["checkOut"];
        $adult = $row["adult"];
        $kids = $row["kids"];
        $room_cost = $row["room_cost"];
        $request = $row["request"];
        $customer_id = $row["customer_id"];
    }

    $querycust = mysqli_query($connect, "SELECT * FROM customer WHERE customer_id = '$customer_id'");

    while($row = mysqli_fetch_array($querycust)){
        $customerID = $row["customer_id"];
        $fname = $row["firstname"];
        $lname = $row["lastname"];
        $email = $row["email"];
        $phonenum = $row["phonenum"];
        $country = $row["country"];
    }

    if($room_cost == 1391){
        $room = 'Family Deluxe Room';
    }
    if($room_cost == 850){
        $room = 'Twin Bed Room';
    }
    if($room_cost == 450){
        $room = 'Single Room';
    }

    $guests = $adult + $kids;
    // $totalTime = date_diff($checkIn,$checkOut);
    $diff = strtotime($checkOut) - strtotime($checkIn);
    // $diff = strtotime($checkOut) - (12 * 60 * 60);
    // $diff = date_diff($checkOut,$checkIn);
    // $diff = $checkIn->diff($checkOut);
    // $totalTime = date("Y-m-d H:i:s", $diff);
    $years = floor($diff / (365*60*60*24));
    $months = floor(($diff - $years * 365*60*60*24)/ (30*60*60*24));
    $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
    $hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24) / (60*60));
    $minutes = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60);
    $seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24- $hours*60*60 - $minutes*60));

    if($hours > 0){
        $totalbill = ((($days*24)/12)+($hours/12)) * $room_cost;
    }
    if($hours == 0){
        $totalbill = (($days*24)/12) * $room_cost;
    }

    mysqli_close($connect);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>KingsWay Inn</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <!-- <link rel="alternate" href="https://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" type="application/atom+xml" title="Atom"> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600&family=Montserrat:ital,wght@0,100;1,100&family=Raleway:ital,wght@0,100;1,100&display=swap" rel="stylesheet">
    
</head>

<body>
    <section class="col-12 col" id="home">
        <nav class="menu cnav col-12 col">
            <ul class="col menuflat col-12 clinks6">
                <a href="index.php" class="clogo" style="margin-left:6%;"><img class="logo" src="images/logo-inline.png" alt=""></a>
                <a href="index.php#Home" class="c-button ">Home</a>
                <!-- <a href="/Activity 1/explore.html" class="c-button ">Explore</a> -->
                <!-- <a href="#rooms" class="c-button ">Rooms</a> -->
                <a href="index.php#amenities" class="c-button ">Amenities</a>
                <a href="index.php#gallery" class="c-button ">Gallery</a>
                <a href="room.php" class="c-button cbooking">Book A Room</a>
                <a href="index.php#map" class="c-button cbooking">Where to find us?</a>
                <a href="index.php#contact" class="c-button cbooking">Contact Us</a>
            </ul>
        </nav>
    </section>
    <header class="col-12 col">
        <!-- <img src="images/room4.png" alt="profile" class="col-12 banner"> -->
        <div class="cite">
            <h1>Reservation</h1>
        </div>
    </header>
    <section class="col-12 col">
        <article class=" col-12 carticle">
            <div class="divcon">
                <div class="container col-4 card2">
                    <div class="congrats">
                        <h3>Congratulations!</h3>
                        <p><?php
                            echo $fname. " " . $lname;
                        ?> your reservation was placed.</p><br>
                    </div>
                    <div class="emailcontainer">
                        <p>Once your reservation is confirmed, you will get an email.</p>
                    </div><br>
                    <div class="grid-container2">
                        <div>
                            <p>Check-In Time	</p>
                            <p>Check-Out Time	</p>
                        </div>
                        <div>
                            <p><?php echo $checkIn ?></p>
                            <p><?php echo $checkOut ?></p>
                        </div>
                    </div><hr><br>
                    <h1>Bill Details</h1>
                    <div class="grid-container2">
                        <div>
                            <p>Room Type</p>
                            <p>Guests</p>
                            <p>Total Stay</p><hr>
                            <h4>Total Bill:</h4>
                        </div>
                        <div>
                            <p><?php echo $room;?></p>
                            <p><?php echo $guests;?></p>
                            <p><?php echo $days ." Day(s) + " . $hours . " Hour(s)" ;?></p><hr>
                            <h4>P <?php echo $totalbill; ?></h4>
                        </div>
                    </div><br>
                    <div class="grid-container2">
                        <div>
                        </div>
                        <div>
                        </div>
                    </div>
                </div>
            </div>
        </article>

    </section>

    <footer id="contact" class="col col-12 cfooter contact">
        <!-- <img src="images/logo2.png" alt="" width="80" height="70"> -->
        <a href="#home"><img src="images/logo2.png" alt="" width="80" height="70" class="mybanner"></a>

        <h3 class="t-align">CONTACT US</h3>
        <div class="condisplay">
            <p class="pdisplay"><a href="mailto:kingsway_way55@yahoo.com">kingsway_way55@yahoo.com</a><br></p>
            <p class="pdisplay">Padilla Bldg., A. Bonifacio Avenue, Iligan, Mindanao 9200 Philippines</p>
            <p class="pdisplay"><a href="tel:09157133862">Call(63+)915-713-3862</a><br></p>
            <p id="copyright ">&copy;<time datetime="2021-04-13 "><em>2021</time>, Kingsway Inn, Iligan. All rights reserved.</em></p>
        </div>
    </footer>
</body>

</html>