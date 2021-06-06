<?php 
	include("function.php");
?>
<!DOCTYPE html>
<html lang="en-US" 	style="height: 100%;">
<head>
	<title>Log in</title>

	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
	<link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<!------ Include the above in your HEAD tag ---------->

</head>
<body>

<div class="container">
           
            <header>
				<div id="headwrap" class="animate form">
					
				</div>
            </header>
            <section>				
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                        	<?php if(isset($_SESSION['error'])){ ?>
	                        	<div class="error_msg">
	                        		<?php 
	                        		echo $_SESSION['error']; 
	                        		unset($_SESSION['error']);
	                        		?>

	                        	</div>
							<?php } ?>
                            <form  action="login.php" autocomplete="on" method="POST"> 
                                <h1>Log in</h1> 
                                <p> 
                                    <label for="username" class="uname" > Your email or username </label>
                                    <input id="username" name="username" required="required" type="text" placeholder="myusername or mymail@mail.com"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd"> Your password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                                </p>
                                <p class="login button"> 
                                   <input type="submit" name="login" value="Login" />
								</p>
                            </form>
                        </div>		
                    </div>
                </div>  
            </section>
        </div>

</body>
</html>