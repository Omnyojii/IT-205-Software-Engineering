<?php
    include 'connection.php';
    $conn = connectdb();

    $id = $_GET['id'];
    $delete = delete('user', $id);
    if ($delete) {
        // header('Location: view.php');
        echo "<script>alert('Record deleted successfully');window.location.href='view.php';</script>";
        die();
    }
    else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
    function delete($table, $id){
        $conn = connectdb();
        $sql = "DELETE FROM $table WHERE id = '$id'";
        return mysqli_query($conn, $sql);
    }
?>
<!-- 
<h1> UPDATE </h1>
<form action="" method="POST">
        <input type="text" name="id" placeholder="id"/>
        <input type="submit" name="submit" onclick="return confirm('Are you sure?')"/>
</form>  -->