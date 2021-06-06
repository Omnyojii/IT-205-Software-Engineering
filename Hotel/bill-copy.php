<?php
    // include "auth.php";
    session_start();
    include "function.php";
    $connect = connectdb();

    date_default_timezone_set('Asia/Manila');
    $roomcost = $_GET['id'];

    if (isset($_POST['newReservation'])){
        $checkIn = date("Y-m-d H:i:s", strtotime($_POST["checkIn"]));
        $toAdd = $_POST['checkOut'];
        $checkOut = date("Y-m-d H:i:s", strtotime($checkIn . "+$toAdd hours"));
	    $adult = $_POST['adult'];
	    $kids = $_POST['kids'];
	    $fname = $_POST['fname'];
	    $lname = $_POST['lname'];
	    $email = $_POST['email'];
	    $phone = $_POST['phone'];
	    $country = $_POST['country'];
	    $request = $_POST['request'];

        // SELECT @usa := country_id from countries where iso_alpha3_code = 'USA';

        // $sql = "SELECT id, firstname, lastname FROM user";
        // $num = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM `users` WHERE ( username = "."'".$_POST['user']."' )"));

        $query = mysqli_query($connect, "SELECT * FROM customer WHERE firstname = '$fname' AND lastname = '$lname'");

        $num = mysqli_num_rows($query);

        if ($num >= 1) {
            $sql = "INSERT INTO reservation (checkIn, checkOut, adult, kids, room_cost, request, customer_id) VALUES ('$checkIn', '$checkOut', '$adult', '$kids', '$roomcost', '$request', (SELECT customer_id FROM customer WHERE firstname ='$fname' AND lastname = '$lname')";

            if (mysqli_query($connect, $sql)) {
                $last_id = $connect->insert_id;
                $_SESSION['reservation'] = $last_id;
                // var_dump($last_id );
                // var_dump($_SESSION['reservation']);
                echo "<script>alert('Successfully reserved');window.location.href='bookinfo.php';</script>";
            } else {
                echo "<script type='text/javascript'>alert('Server1 is busy!');</script>";
            }

            mysqli_close($connect);

        } else {
            "INSERT INTO customer (fistname, lastname, email, phonenum, country) VALUES ('$fname', '$lname', '$email', '$phone', '$country')";
            // $last_id = $connect->insert_id;
            $sql = "INSERT INTO reservation (checkIn, checkOut, adult, kids, room_cost, request, customer_id) VALUES ('$checkIn', '$checkOut', '$adult', '$kids', '$roomcost', '$request', LAST_INSERT_ID())";
            // $sql = "UPDATE room SET room_type = '$roomtype', is_available = '$isavailable', reservation_id = '$reservationid' WHERE room_id = '$roomnum'";
            
            $sql = mysqli_query("INSERT INTO `wine` (`wine_type`, `country`, `indicator`, `colour`) VALUES ('Merlot', 'Australia', 'Dry', 'Red')");
            $sql = mysqli_query("INSERT INTO `stock` (`wine_id`, `quantity`) VALUES ('".mysql_insert_id()."', '0');");

            if (mysqli_query($connect, $sql)) {
                $last_id = $connect->insert_id;
                $_SESSION['reservation'] = $last_id;
                // var_dump($last_id );
                // var_dump($_SESSION['reservation']);
                echo "<script>alert('Successfully reserved');window.location.href='bookinfo.php';</script>";
            } else {
                echo "<script type='text/javascript'>alert('Server2 is busy!');</script>";
            }

            mysqli_close($connect);
        }
    }
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
                    <form action="" method="post" id="myForm">
                        <h3>Booking Information</h3>
                        <label for="checkIn">Check In</label>
                        <!-- <input name="checkIn" id="checkIn" class="datebox input-field" type="datetime-local" placeholder="Check-In" > -->
                        <input name="checkIn" id="checkIn" class="datebox input-field" type="text" onfocus="(this.type='datetime-local')" onblur="(this.type='text')" placeholder="Check-In" required>

                        <label for="checkOut">Hours of stay</label>
                        <input name="checkOut"  id="checkOut" class="datebox input-field" type="number" placeholder="12 hours interval" min="12" value="" step="12" required>
                        <!-- <input name="checkOut" id="checkOut" class="datebox input-field" type="datetime-local" placeholder="Check-Out" > -->
                        <!-- <input name="checkOut" id="checkOut" class="datebox input-field" type="text" onfocus="(this.type='datetime-local')" onblur="(this.type='text')" placeholder="Check-Out" required> -->

                        <label for="adult">Adults</label>
                        <?php
                            if($roomcost == 450){ ?>
                                <input name="adult" id="adult" class="adult input-field" type="number" placeholder="Adults" min="1" max="1" value="1" required>
                            <?php }
                            if($roomcost == 850){ ?>
                                <input name="adult" id="adult" class="adult input-field" type="number" placeholder="Adults (max 2)" min="1" max="2" required>
                            <?php }
                            if($roomcost == 1391){ ?>
                                <input name="adult" id="adult" class="adult input-field" type="number" placeholder="Adults (max 2)" min="1" max="2" required>
                            <?php }
                        ?>

                        <label for="kids">Kids</label>
                        <?php
                            if($roomcost == 450){ ?>
                                <input name="kids"  id="kids" class="kids input-field" type="number" placeholder="Kids" min="0" max="0" value="0" required>
                            <?php }
                            if($roomcost == 850){ ?>
                                <input name="kids"  id="kids" class="kids input-field" type="number" placeholder="Kids (max 1)" min="0" max="1" required>
                            <?php }
                            if($roomcost == 1391){ ?>
                                <input name="kids"  id="kids" class="kids input-field" type="number" placeholder="Kids (max 2)" min="0" max="2" required>
                            <?php }
                        ?>

                        <label for="roomcost">Room Cost</label>
                        <input name="roomcost" value="<?php echo $roomcost; ?>"  id="roomtype" class="roomtype input-field" type="text" placeholder="" readonly>

                        <h3>Guest Details</h3>
                        <label for="fname">First Name</label>
                        <input name="fname"  id="fname" class="fname input-field" type="text" placeholder="" required>

                        <label for="lname">Last Name</label>
                        <input name="lname"  id="lname" class="lname input-field" type="text" placeholder="" required>

                        <label for="email">Email</label>
                        <input name="email"  id="email" class="email input-field" type="email" placeholder="" required>

                        <label for="phone">Contact Number</label>
                        <input name="phone" id="phone" class="phone input-field" type="text" placeholder="0912-345-6789" required><br><br>

                        <label for="country">Country</label><span style="color: red !important; display: inline; float: none;">*</span>
                        <select id="country" name="country" class="country input-field" required>
                            <option value="Afghanistan">Afghanistan</option>
                            <option value="Åland Islands">Åland Islands</option>
                            <option value="Albania">Albania</option>
                            <option value="Algeria">Algeria</option>
                            <option value="American Samoa">American Samoa</option>
                            <option value="Andorra">Andorra</option>
                            <option value="Angola">Angola</option>
                            <option value="Anguilla">Anguilla</option>
                            <option value="Antarctica">Antarctica</option>
                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                            <option value="Argentina">Argentina</option>
                            <option value="Armenia">Armenia</option>
                            <option value="Aruba">Aruba</option>
                            <option value="Australia">Australia</option>
                            <option value="Austria">Austria</option>
                            <option value="Azerbaijan">Azerbaijan</option>
                            <option value="Bahamas">Bahamas</option>
                            <option value="Bahrain">Bahrain</option>
                            <option value="Bangladesh">Bangladesh</option>
                            <option value="Barbados">Barbados</option>
                            <option value="Belarus">Belarus</option>
                            <option value="Belgium">Belgium</option>
                            <option value="Belize">Belize</option>
                            <option value="Benin">Benin</option>
                            <option value="Bermuda">Bermuda</option>
                            <option value="Bhutan">Bhutan</option>
                            <option value="Bolivia">Bolivia</option>
                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                            <option value="Botswana">Botswana</option>
                            <option value="Bouvet Island">Bouvet Island</option>
                            <option value="Brazil">Brazil</option>
                            <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                            <option value="Brunei Darussalam">Brunei Darussalam</option>
                            <option value="Bulgaria">Bulgaria</option>
                            <option value="Burkina Faso">Burkina Faso</option>
                            <option value="Burundi">Burundi</option>
                            <option value="Cambodia">Cambodia</option>
                            <option value="Cameroon">Cameroon</option>
                            <option value="Canada">Canada</option>
                            <option value="Cape Verde">Cape Verde</option>
                            <option value="Cayman Islands">Cayman Islands</option>
                            <option value="Central African Republic">Central African Republic</option>
                            <option value="Chad">Chad</option>
                            <option value="Chile">Chile</option>
                            <option value="China">China</option>
                            <option value="Christmas Island">Christmas Island</option>
                            <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                            <option value="Colombia">Colombia</option>
                            <option value="Comoros">Comoros</option>
                            <option value="Congo">Congo</option>
                            <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                            <option value="Cook Islands">Cook Islands</option>
                            <option value="Costa Rica">Costa Rica</option>
                            <option value="Cote D'ivoire">Cote D'ivoire</option>
                            <option value="Croatia">Croatia</option>
                            <option value="Cuba">Cuba</option>
                            <option value="Cyprus">Cyprus</option>
                            <option value="Czech Republic">Czech Republic</option>
                            <option value="Denmark">Denmark</option>
                            <option value="Djibouti">Djibouti</option>
                            <option value="Dominica">Dominica</option>
                            <option value="Dominican Republic">Dominican Republic</option>
                            <option value="Ecuador">Ecuador</option>
                            <option value="Egypt">Egypt</option>
                            <option value="El Salvador">El Salvador</option>
                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                            <option value="Eritrea">Eritrea</option>
                            <option value="Estonia">Estonia</option>
                            <option value="Ethiopia">Ethiopia</option>
                            <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                            <option value="Faroe Islands">Faroe Islands</option>
                            <option value="Fiji">Fiji</option>
                            <option value="Finland">Finland</option>
                            <option value="France">France</option>
                            <option value="French Guiana">French Guiana</option>
                            <option value="French Polynesia">French Polynesia</option>
                            <option value="French Southern Territories">French Southern Territories</option>
                            <option value="Gabon">Gabon</option>
                            <option value="Gambia">Gambia</option>
                            <option value="Georgia">Georgia</option>
                            <option value="Germany">Germany</option>
                            <option value="Ghana">Ghana</option>
                            <option value="Gibraltar">Gibraltar</option>
                            <option value="Greece">Greece</option>
                            <option value="Greenland">Greenland</option>
                            <option value="Grenada">Grenada</option>
                            <option value="Guadeloupe">Guadeloupe</option>
                            <option value="Guam">Guam</option>
                            <option value="Guatemala">Guatemala</option>
                            <option value="Guernsey">Guernsey</option>
                            <option value="Guinea">Guinea</option>
                            <option value="Guinea-bissau">Guinea-bissau</option>
                            <option value="Guyana">Guyana</option>
                            <option value="Haiti">Haiti</option>
                            <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                            <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                            <option value="Honduras">Honduras</option>
                            <option value="Hong Kong">Hong Kong</option>
                            <option value="Hungary">Hungary</option>
                            <option value="Iceland">Iceland</option>
                            <option value="India">India</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                            <option value="Iraq">Iraq</option>
                            <option value="Ireland">Ireland</option>
                            <option value="Isle of Man">Isle of Man</option>
                            <option value="Israel">Israel</option>
                            <option value="Italy">Italy</option>
                            <option value="Jamaica">Jamaica</option>
                            <option value="Japan">Japan</option>
                            <option value="Jersey">Jersey</option>
                            <option value="Jordan">Jordan</option>
                            <option value="Kazakhstan">Kazakhstan</option>
                            <option value="Kenya">Kenya</option>
                            <option value="Kiribati">Kiribati</option>
                            <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                            <option value="Korea, Republic of">Korea, Republic of</option>
                            <option value="Kuwait">Kuwait</option>
                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                            <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                            <option value="Latvia">Latvia</option>
                            <option value="Lebanon">Lebanon</option>
                            <option value="Lesotho">Lesotho</option>
                            <option value="Liberia">Liberia</option>
                            <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                            <option value="Liechtenstein">Liechtenstein</option>
                            <option value="Lithuania">Lithuania</option>
                            <option value="Luxembourg">Luxembourg</option>
                            <option value="Macao">Macao</option>
                            <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                            <option value="Madagascar">Madagascar</option>
                            <option value="Malawi">Malawi</option>
                            <option value="Malaysia">Malaysia</option>
                            <option value="Maldives">Maldives</option>
                            <option value="Mali">Mali</option>
                            <option value="Malta">Malta</option>
                            <option value="Marshall Islands">Marshall Islands</option>
                            <option value="Martinique">Martinique</option>
                            <option value="Mauritania">Mauritania</option>
                            <option value="Mauritius">Mauritius</option>
                            <option value="Mayotte">Mayotte</option>
                            <option value="Mexico">Mexico</option>
                            <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                            <option value="Moldova, Republic of">Moldova, Republic of</option>
                            <option value="Monaco">Monaco</option>
                            <option value="Mongolia">Mongolia</option>
                            <option value="Montenegro">Montenegro</option>
                            <option value="Montserrat">Montserrat</option>
                            <option value="Morocco">Morocco</option>
                            <option value="Mozambique">Mozambique</option>
                            <option value="Myanmar">Myanmar</option>
                            <option value="Namibia">Namibia</option>
                            <option value="Nauru">Nauru</option>
                            <option value="Nepal">Nepal</option>
                            <option value="Netherlands">Netherlands</option>
                            <option value="Netherlands Antilles">Netherlands Antilles</option>
                            <option value="New Caledonia">New Caledonia</option>
                            <option value="New Zealand">New Zealand</option>
                            <option value="Nicaragua">Nicaragua</option>
                            <option value="Niger">Niger</option>
                            <option value="Nigeria">Nigeria</option>
                            <option value="Niue">Niue</option>
                            <option value="Norfolk Island">Norfolk Island</option>
                            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                            <option value="Norway">Norway</option>
                            <option value="Oman">Oman</option>
                            <option value="Pakistan">Pakistan</option>
                            <option value="Palau">Palau</option>
                            <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                            <option value="Panama">Panama</option>
                            <option value="Papua New Guinea">Papua New Guinea</option>
                            <option value="Paraguay">Paraguay</option>
                            <option value="Peru">Peru</option>
                            <option value="Philippines">Philippines</option>
                            <option value="Pitcairn">Pitcairn</option>
                            <option value="Poland">Poland</option>
                            <option value="Portugal">Portugal</option>
                            <option value="Puerto Rico">Puerto Rico</option>
                            <option value="Qatar">Qatar</option>
                            <option value="Reunion">Reunion</option>
                            <option value="Romania">Romania</option>
                            <option value="Russian Federation">Russian Federation</option>
                            <option value="Rwanda">Rwanda</option>
                            <option value="Saint Helena">Saint Helena</option>
                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                            <option value="Saint Lucia">Saint Lucia</option>
                            <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                            <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                            <option value="Samoa">Samoa</option>
                            <option value="San Marino">San Marino</option>
                            <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                            <option value="Saudi Arabia">Saudi Arabia</option>
                            <option value="Senegal">Senegal</option>
                            <option value="Serbia">Serbia</option>
                            <option value="Seychelles">Seychelles</option>
                            <option value="Sierra Leone">Sierra Leone</option>
                            <option value="Singapore">Singapore</option>
                            <option value="Slovakia">Slovakia</option>
                            <option value="Slovenia">Slovenia</option>
                            <option value="Solomon Islands">Solomon Islands</option>
                            <option value="Somalia">Somalia</option>
                            <option value="South Africa">South Africa</option>
                            <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                            <option value="Spain">Spain</option>
                            <option value="Sri Lanka">Sri Lanka</option>
                            <option value="Sudan">Sudan</option>
                            <option value="Suriname">Suriname</option>
                            <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                            <option value="Swaziland">Swaziland</option>
                            <option value="Sweden">Sweden</option>
                            <option value="Switzerland">Switzerland</option>
                            <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                            <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                            <option value="Tajikistan">Tajikistan</option>
                            <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                            <option value="Thailand">Thailand</option>
                            <option value="Timor-leste">Timor-leste</option>
                            <option value="Togo">Togo</option>
                            <option value="Tokelau">Tokelau</option>
                            <option value="Tonga">Tonga</option>
                            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                            <option value="Tunisia">Tunisia</option>
                            <option value="Turkey">Turkey</option>
                            <option value="Turkmenistan">Turkmenistan</option>
                            <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                            <option value="Tuvalu">Tuvalu</option>
                            <option value="Uganda">Uganda</option>
                            <option value="Ukraine">Ukraine</option>
                            <option value="United Arab Emirates">United Arab Emirates</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="United States">United States</option>
                            <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                            <option value="Uruguay">Uruguay</option>
                            <option value="Uzbekistan">Uzbekistan</option>
                            <option value="Vanuatu">Vanuatu</option>
                            <option value="Venezuela">Venezuela</option>
                            <option value="Viet Nam">Viet Nam</option>
                            <option value="Virgin Islands, British">Virgin Islands, British</option>
                            <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                            <option value="Wallis and Futuna">Wallis and Futuna</option>
                            <option value="Western Sahara">Western Sahara</option>
                            <option value="Yemen">Yemen</option>
                            <option value="Zambia">Zambia</option>
                            <option value="Zimbabwe">Zimbabwe</option>
                        </select>

                        <label for="request">Special Request</label>
                        <textarea name="request" id="request" class="input-field" cols="67" rows="5"></textarea>

                        <p>• By completing this booking I acknowledge I have read and accepted the Property Policies.</p>

                        <input type="submit" name="newReservation" value="Apply for Reservation" class="btn info">
                    </form>
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