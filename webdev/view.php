
<!DOCTYPE html>
<html>
<head>
    <title>View</title>
    <link href="css/style.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript">
      function deleteAccount(id){
        if(confirm("Are you sure you want to delete?")){
          window.location = 'delete.php?id=' + id;
        }
      }
      function editAccount(id){
          window.location = 'update.php?id=' + id;
      }
    </script>
</head>
<body>
    <div class="topnav">
        <span class="otto">READ</span>
        <a href="index.php">HOME</a>
        <a href="view.php" class="active">VIEW</a>
        <a href="update.php">EDIT</a>
        <a href="delete2.php">DELETE</a>
    </div>
    <table id="customers">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Action</th>
        </tr>

<?php
    include 'connection.php';
    $conn = connectdb();
   
    ini_set('display_errors', 'Off');

    $sql = "SELECT id, firstname, lastname FROM user";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td> " . $row["id"]. " </td>";
            echo "<td> " . $row["firstname"]. " </td>";
            echo "<td> " . $row["lastname"]. " </td>";
            ?>
            <td><a href="#" onclick="javascript: editAccount(<?php echo $row['id']; ?>)">Edit</a> | <a href="#" onclick="javascript: deleteAccount(<?php echo $row['id']; ?>)">Delete</a></td>
            <?php echo "</tr>";
        }
    }else {
        echo "0 results";
    }

    echo "</table>";

    $conn->close();


?>


</body>
</html>



