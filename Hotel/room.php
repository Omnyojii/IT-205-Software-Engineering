<?php
echo $_GET['fname'];



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
    <script type="text/javascript">
      function selectRoom(id){
          window.location = 'bill.php?id=' + id;
      }
    </script>
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
            <h1>Our Rooms</h1>
        </div>
    </header>
    <section class="col-12 col">
        <article class=" col-12 carticle">
            <div class=" divcon">
                <!-- item -->
                <div class="col-9-10  card3 grid-container">
                    <div>
                        <img src="images/r2.jpg" alt="" width="320" height="200">
                        <div class="currentRooms">
                            <!-- <h5>Current Rooms Available: &nbsp;&nbsp; </h5><h4>0</h4> -->
                        </div>
                    </div>
                    <div>
                        <h1>Family Deluxe Room</h1>
                        <p>Our Newest Rooms offer breathtaking views of the city skyline.<br>Pleasure our new comfortable bed, shower, lamps, etc.</p>
                        <ul>
                            <li> Beds: 1 Double(s) & 1 Single(s)</li>
                        </ul>
                        <hr class="col-11 col"><br><br>
                        <i class="fas fa-tv" title="TV"></i>&nbsp;&nbsp;
                        <i class="fas fa-wifi" title="Free Wifi"></i>&nbsp;&nbsp;
                        <i class="far fa-snowflake" title="A/C"></i>&nbsp;&nbsp;
                        <i class="fas fa-phone-alt" title="Phone"></i>&nbsp;&nbsp;
                        <i class="fas fa-mug-hot" title="Free Coffee"></i>&nbsp;&nbsp;
                        <i class="fas fa-toilet" title="Toilet"></i>&nbsp;&nbsp;
                        <i class="fas fa-luggage-cart" title="Luggage Cart"></i>&nbsp;&nbsp;
                        <i class="fas fa-door-closed" title="Cabinet"></i></i>&nbsp;&nbsp;
                        <i class="fas fa-pencil-ruler" title="Work space"></i>&nbsp;&nbsp;
                        <i class="fas fa-shower" title="Shower"></i>&nbsp;&nbsp;
                        <i class="fas fa-glass-cheers" title="Liquors Allowed"></i>&nbsp;&nbsp;
                        <i class="fas fa-concierge-bell" title="Room Service"></i></i>&nbsp;&nbsp;
                        <i class="fas fa-utensils" title="Free Food"></i>&nbsp;&nbsp;
                        <i class="fas fa-satellite-dish" title="Cable"></i>
                    </div>
                    <div>
                        <p>From</p>
                        <h1>P1391</h1>
                        <p>For 24 hours</p>
                        <br>
                        <button type="submit" value="Book Now" class="btn btncontact btnroom" onclick="javascript: selectRoom(1391)">Book Now</button>
                        <!-- <form action="bill.php" method="POST">
                            <input type="text" name="room" value="1391" style="visibility:hidden;display:absolute;">
                            <input type="submit" value="Book Now" class="btn btncontact btnroom">
                        </form> -->
                    </div>
                </div>
                <!-- end: -->

                <!-- item -->
                <div class="col-9-10  card3 grid-container">
                    <div>
                        <img src="images/o1.jpg" alt=" " width="320" height="200">
                        <div class="currentRooms">
                            <!-- <h5>Current Rooms Available: &nbsp;&nbsp; </h5><h4>0</h4> -->
                        </div>
                    </div>
                    <div>
                        <h1>Twin Bed Room</h1>
                        <p>Our Classic Dual are comfortable, roomy and elegant.</p>
                        <ul>
                            <li> Beds: 2 Single(s)</li>
                        </ul>
                        <hr class="col-11 col"><br><br>
                        <i class="fas fa-tv" title="TV"></i>&nbsp;&nbsp;
                        <i class="fas fa-wifi" title="Free Wifi"></i>&nbsp;&nbsp;
                        <i class="far fa-snowflake" title="A/C"></i>&nbsp;&nbsp;
                        <i class="fas fa-phone-alt" title="Phone"></i>&nbsp;&nbsp;
                        <i class="fas fa-mug-hot" title="Free Coffee"></i>&nbsp;&nbsp;
                        <i class="fas fa-toilet" title="Toilet"></i>&nbsp;&nbsp;
                        <i class="fas fa-luggage-cart" title="Luggage Cart"></i>&nbsp;&nbsp;
                        <i class="fas fa-door-closed" title="Cabinet"></i></i>&nbsp;&nbsp;
                        <i class="fas fa-pencil-ruler" title="Work space"></i>&nbsp;&nbsp;
                        <i class="fas fa-shower" title="Shower"></i>&nbsp;&nbsp;
                        <i class="fas fa-glass-cheers" title="Liquors Allowed"></i>&nbsp;&nbsp;
                        <i class="fas fa-concierge-bell" title="Room Service"></i></i>&nbsp;&nbsp;

                    </div>
                    <div>
                        <p>From</p>
                        <h1>P850</h1>
                        <p>For 24 hours</p>
                        <br>
                        <button type="submit" value="Book Now" class="btn btncontact btnroom" onclick="javascript: selectRoom(850)">Book Now</button>
                        <!-- <form action="bill.php" method="POST">
                            <input type="text" name="room" value="850" style="display:none;">
                            <input type="submit" value="Book Now" class="btn btncontact btnroom">
                        </form> -->
                    </div>
                </div>
                <!-- end: -->

                <!-- item -->
                <div class="col-9-10  card3 grid-container">
                    <div>
                        <img src="images/o2.jpg" alt="" width="320" height="200">
                        <div class="currentRooms">
                            <!-- <h5>Current Rooms Available: &nbsp;&nbsp; </h5><h4>0</h4> -->
                        </div>
                    </div>
                    <div>
                        <h1>Single Room</h1>
                        <p>Our Classic Single are the perfect combination of function <br> and comfort.</p>
                        <ul>
                            <li> Beds: 1 Single(s)</li>
                        </ul>
                        <hr class="col-11 col"><br><br>
                        <i class="fas fa-tv" title="TV"></i>&nbsp;&nbsp;
                        <i class="fas fa-wifi" title="Free Wifi"></i>&nbsp;&nbsp;
                        <i class="far fa-snowflake" title="A/C"></i>&nbsp;&nbsp;
                        <i class="fas fa-phone-alt" title="Phone"></i>&nbsp;&nbsp;
                        <i class="fas fa-mug-hot" title="Free Coffee"></i>&nbsp;&nbsp;
                        <i class="fas fa-toilet" title="Toilet"></i>&nbsp;&nbsp;
                        <i class="fas fa-luggage-cart" title="Luggage Cart"></i>&nbsp;&nbsp;
                        <i class="fas fa-door-closed" title="Cabinet"></i></i>&nbsp;&nbsp;
                        <i class="fas fa-pencil-ruler" title="Work space"></i>&nbsp;&nbsp;
                        <i class="fas fa-shower" title="Shower"></i>&nbsp;&nbsp;
                        <i class="fas fa-glass-cheers" title="Liquors Allowed"></i>&nbsp;&nbsp;
                        <i class="fas fa-concierge-bell" title="Room Service"></i></i>&nbsp;&nbsp;

                    </div>
                    <div>
                        <p>From</p>
                        <h1>P450</h1>
                        <p>For 24 hours</p>
                        <br>
                        <button type="submit" value="Book Now" class="btn btncontact btnroom" onclick="javascript: selectRoom(450)">Book Now</button>
                        <!-- <form action="bill.php" method="POST">
                            <input type="text" name="room" value="450" style="display:none;">
                            <input type="submit" value="Book Now" class="btn btncontact btnroom">
                        </form> -->
                    </div>
                </div>
                <!-- end: -->
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
        
        
        <!-- <div class="social" id="contact">
            <div class="social text-center">
                <a href="http://twitter.com/ccosingan "><i class="fa fa-twitter "></i></a>
                <a href="http://facebook.com/ccosingan "><i class="fa fa-facebook "></i></a>
                <a href="http://omnyojii.github.io "><i class="fa fa-github "></i></a>
                <a href="https://join.skype.com/invite/uuvgceApcfgW "><i class="fa fa-skype "></i></a>
                <a href="http://www.linkedin.com/in/christopher-christian-cosingan-854290b6 "><i class="fa fa-linkedin "></i></a>
                <address><br>
                For any inquiries, questions or commendations, you may contact us :<br><br>
                    <a href="tel:09157133862">Call(63+)915-713-3862</a><br>
                    <a href="mailto:kingsway_way55@yahoo.com">kingsway_way55@yahoo.com</a><br>
                    <a href="https://www.facebook.com/kingswayiliganhotel" target="_blank" rel="noopener noreferrer">https://www.facebook.com/kingswayiliganhotel</a>
                </address>
               
            </div>
            <div class="clear "></div>
        </div> -->
        

    </footer>
</body>

</html>