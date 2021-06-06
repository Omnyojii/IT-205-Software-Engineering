<?php
    include "auth.php";
    include "function.php";
    $conn = connectdb();

    $id = $_GET['id'];
    $tablethis = $_GET['table'];
    $column = $_GET['column'];
    $deletethis = deletethis($tablethis, $id, $column);
    // echo $tablethis;
    // echo $id;
    if ($deletethis) {
        // header('Location: view.php');
        // echo "<script>alert('Record deleted successfully');window.location.href='view.php';</script>";
        echo "<script>alert('Record deleted successfully');window.location.href=document.referrer;</script>";
        die();
    }
    else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
    function deletethis($tablethis, $id, $column){
        $conn = connectdb();
        $sql = "DELETE FROM $tablethis WHERE $column = '$id'";
        return mysqli_query($conn, $sql);
    }
?>
<!-- 
<h1> UPDATE </h1>
<form action="" method="POST">
        <input type="text" name="id" placeholder="id"/>
        <input type="submit" name="submit" onclick="return confirm('Are you sure?')"/>
</form>  -->