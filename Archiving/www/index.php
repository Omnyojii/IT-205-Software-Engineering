<?php 
    session_start();
	include "function.php";
    // require('function.php');
    connectdb();
    
    if(isset($_SESSION["cuser"])){
        header("Location: dashboard.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en-US" 	style="height: 100%;">
<head>
    <title>Log in</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins|Audiowide">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <!-- <link rel="alternate" href="https://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" type="application/atom+xml" title="Atom"> -->
    <script src="script.js"></script>
	<!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" /> -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> -->
<!------ Include the above in your HEAD tag ---------->

</head>
<body>
    <div class="col-10 blogo-container">
        <img class="blogo" src="../www/images/mysmclogo.png" alt="" width="400px">
        <h1>Welcome to St. Michael's College Research Office!</h1>
    </div>
    <div id="" class="col-2-3 colr logcon card">
        <section id="" class="sectcon">
            <div id="" class="">
                <a class="hiddenanchor" id="toregister"></a>
                <a class="hiddenanchor" id="tologin"></a>
                <div id="wrapper">
                    <img class="bwlogo" src="../www/images/cropped-smc-150x150-1-192x192.png" alt="" >
                    <h1>Research Office</h1>
                    <div id="login" class="animate form">
                        <form  action="login.php" autocomplete="on" method="POST" class="formcon"> 
                            <div class="input-group">
                                <i class="fa fa-user icon"></i>
                                <label for="username" class="uname"></label>
                                <input id="username" class="input-field" name="username" required="required" type="text" placeholder="Your ID Number"/>
                            </div>

                            <div class="input-group">
                                <i class="fa fa-lock icon"></i>
                                <label for="password" class="youpasswd"></label>
                                <input id="password" class="input-field" name="password" required="required" type="password" placeholder="Password"/> 
                            </div>
                            <div class="col-6">
                                <input type="checkbox" onclick="togglePass()" class="">Show Password 
                            </div>
                            <br>
                            <div class="container">
                                <button type="submit" name="login" value="Login" class="btn">Sign In</button>
                            </div>
                        </form>
                        <br><hr class="col-10"><br>
                        <div class="container">
                                <a href="registration.php"><button class="cbtn success btnwide">Sign Up</button></a>
                        </div>
                    </div>		
                </div>
            </div>  
        </section>
    </div>
</body>
</html>