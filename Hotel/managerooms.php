<?php 
    include "auth.php";
    include "function.php";
    $connect = connectdb();

    $newID = $_GET['id'];
    $roomcost = $_GET['roomcost'];

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
    
    <!-- <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script> -->
    <!-- <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <s src="jquery-3.5.1.min.js"></s>

    <script type="text/javascript">
      function accommodatenot(id,roomtype){
        if(confirm("Are you sure you want to check-out?")){
          window.location = 'accommodatenot.php?id=' + id + '&roomtype=' + roomtype;
        }
      };
      document.getElementById("#room34").innerHTML = "dasdasdasda";
    </script>
   
</head>

<body>
    <section class="cnav menu col-12 col">
        <nav class="col-12 col">
            <ul class="col menuflat col-12 clinks6">
                <a href="index.php#Home" class="clogo" style="margin-left:6%;"><img class="logo" src="images/logo-inline.png" alt=""></a>
                <a href="reservations.php" class="c-button cbooking">Reservations</a>
                <a href="inquiries.php" class="c-button cbooking">Inquiries</a>
                <a href="customers.php" class="c-button cbooking">Customers</a>
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
            <h1>Manage Rooms</h1>
        </div>
    </header>
	<section id="" class="col-12 col">
        <section id="" class="col-12 col">
            <div id="wrapper">
                <div id="" class="card5 col-11">
                <div style="color: white;">
                    <!-- <span><i class="fas fa-palette" style="color: red;"></i> Room Occupied </span>&nbsp;	&nbsp;	&nbsp;	 -->
                    <span><i class="fas fa-bed" style="color: #4CAF50;"></i> Single Bed Room</span>&nbsp;	&nbsp;	&nbsp;	
                    <span><i class="fas fa-bed" style="color: #ec884d;"></i> Twin Bed Room</span>&nbsp;	&nbsp;	&nbsp;	
                    <span><i class="fas fa-bed" style="color: #0b7dda;"></i> Family Bed Room</span>
                </div>
                <section class="room-container">
                    <table border="1" id="rooms">
                        <tr>
                            <td class="single" id="room1"><strong>Room 1</strong></td>
                            <td class="single" id="room2"><strong>Room 2</strong></td>
                            <td class="single" id="room3"><strong>Room 3</strong></td>
                            <td class="single" id="room4"><strong>Room 4</strong></td>
                            <td class="single" id="room5"><strong>Room 5</strong></td>
                            <td class="single" id="room6"><strong>Room 6</strong></td>
                            <td class="single" id="room7"><strong>Room 7</strong></td>
                        </tr>
                        <tr>
                            <td class="single" id="room8"><strong>Room 8</strong></td>
                            <td class="single" id="room9"><strong>Room 9</strong></td>
                            <td class="single" id="room10"><strong>Room 10</strong></td>
                            <td class="single" id="room11"><strong>Room 11</strong></td>
                            <td class="single" id="room12"><strong>Room 13</strong></td>
                            <td class="single" id="room13"><strong>Room 12</strong></td>
                            <td class="single" id="room14"><strong>Room 14</strong></td>
                        </tr>
                        <tr>
                            <td class="twin" id="room15"><strong>Room 15</strong></td>
                            <td class="twin" id="room16"><strong>Room 16</strong></td>
                            <td class="twin" id="room17"><strong>Room 17</strong></td>
                            <td class="twin" id="room18"><strong>Room 18</strong></td>
                            <td class="twin" id="room19"><strong>Room 19</strong></td>
                            <td class="twin" id="room20"><strong>Room 20</strong></td>
                            <td class="twin" id="room21"><strong>Room 21</strong></td>
                        </tr>
                        <tr>
                            <td class="twin" id="room22"><strong>Room 22</strong></td>
                            <td class="twin" id="room23"><strong>Room 23</strong></td>
                            <td class="twin" id="room24"><strong>Room 24</strong></td>
                            <td class="twin" id="room25"><strong>Room 25</strong></td>
                            <td class="twin" id="room26"><strong>Room 26</strong></td>
                            <td class="twin" id="room27"><strong>Room 27</strong></td>
                            <td class="twin" id="room28"><strong>Room 28</strong></td>
                        </tr>
                        <tr>
                            <td class="family" id="room29"><strong>Room 29</strong></td>
                            <td class="family" id="room30"><strong>Room 30</strong></td>
                            <td class="family" id="room31"><strong>Room 31</strong></td>
                            <td class="family" id="room32"><strong>Room 32</strong></td>
                            <td class="family" id="room33"><strong>Room 33</strong></td>
                            <td class="family" id="room34"><strong>Room 34</strong></td>
                        </tr>
                    </table>
                </section>
                </div>
            </div>
        </section>
        <section id="" class="col-12 col">
            <div id="wrapper">
                <div id="login" class="container card2 col-4">
                    <form action="accommodate.php" method="post" id="myForm">
                        <h3>Room Accommodation Information</h3>
                        <label for="roomnum">Room Number:</label>
                        <input name="roomnum"  id="roomnum" class="input-field" type="number" value="" placeholder="1 to 34" min="1" max="34" required>
                        
                        <label for="roomtype">Room Type:</label>
                        <input name="roomtype" id="roomtype" class="input-field" value="" type="text" placeholder="" readonly>
                        <!-- <select id="roomtype" name="roomtype" class="input-field" required readonly>
                            <option value="Single">Single</option>
                            <option value="Twin">Twin</option>
                            <option value="Family">Family</option>
                        </select> -->

                        <div class="regcheck">
                        <label for="isavailable">Is this room available?</label>
                        <input type="radio" id="isavailableTrue" name="isavailable" class="" value="1">
                        <label for="isavailableTrue">True</label>
                        <input type="radio" id="isavailableFalse" name="isavailable" class="" value="0">
                        <label for="isavailableFalse">False</label>

                        </div>

                        <label for="reservationid">Reservation ID:</label>
                        <input name="reservationid" id="reservationid" class="input-field" value="<?php echo $newID; ?>" type="text" placeholder="Leave blank if room isn't occupied">

                        <input type="submit" name="accommodate" value="Apply for Accommodation" class="btn info">
                    </form>
                    <br>
                </div>
            </div>
        </section>
    </section>
    <footer id="" class="col col-12">
        <p id="copyright ">&copy;<time datetime="2021-04-13 "><em>2021</time>, Kingsway Inn, Iligan. All rights reserved.</em></p>
    </footer>
    <?php
        $sql = "SELECT * FROM room";
        $query = mysqli_query($connect, $sql);
        while($row = mysqli_fetch_array($query)){
            if($row['is_available'] == '0' and $row['reservation_id'] != '0'){
                echo "<script type='text/javascript'> document.getElementById('room".$row['room_id']."').innerHTML += '<br><span>Reserved ID: ".$row['reservation_id']."</span>';</script>";
                $myvalue = $row["room_id"];
                echo "<style> #room".$row['room_id']."{filter: brightness(110%); color: white;}</style>";
            }
        }
    ?>
    <script>
    document.getElementById("roomnum").addEventListener("input", myFunction);

    function myFunction() {
        var inputVal = document.getElementById("roomnum").value;

        if(inputVal <= 14){
            document.getElementById("roomtype").value = "Single";
        }
        if(inputVal >= 15  && inputVal <= 28){
            document.getElementById("roomtype").value = "Twin";
        }
        if(inputVal >= 29  && inputVal <= 34){
            document.getElementById("roomtype").value = "Family";
        }
    }
    </script>
</body>

</html>