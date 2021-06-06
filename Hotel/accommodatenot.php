<?php
    // include "auth.php";
    session_start();
    include "function.php";
    $connect = connectdb();

    $roomnum = $_GET['roomnum2'];
    // $roomtype = $_GET['roomtype'];
    // $isavailable = ;
    $reservationid = '';

    $sql = "UPDATE room SET is_available = '1', reservation_id = '0' WHERE room_id = '$roomnum'";

    $query = mysqli_query($connect, $sql);

    if ($query) {
        // echo "<script>alert('Successfully accommodated');window.location.href=document.referrer;</script>";
        echo "<script>alert('Successfully accommodated');</script>";
        die();
    } else {
        $connect->close();
        // echo "<script type='text/javascript'>alert('Server is busy!'); window.location.href=document.referrer;</script>";
        echo "<script type='text/javascript'>alert('Server is busy!'); </script>";
    }
    $connect->close();
?>