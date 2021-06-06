<!DOCTYPE html>
<html>
<head>
    <title>Demo</title>
    <link href="css/style.css" rel="stylesheet" />
</head>
<body>
<div class="topnav">
    <span class="otto">CREATE</span>
    <a href="index.php" class="active" >HOME</a>
    <a href="view.php">VIEW</a>
    <a href="update.php">EDIT</a>
    <a href="delete2.php">DELETE</a>
    
</div>

<div class="container">
    <h1>Create Data</h1>
    <form action="insert.php" method="POST">
        <input type="text" name="firstname" placeholder="First Name"/>
        <input type="text" name="lastname" placeholder="Last Name"/>
        <input type="submit" name="submit"/>
    </form>
</div>
</body>
</html>



