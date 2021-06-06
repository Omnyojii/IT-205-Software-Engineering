<?php
    // include "auth.php";
    session_start();
    include "function.php";
    $connect = connectdb();

    if (isset($_POST['accommodate'])){
        $roomnum = $_POST['roomnum'];
        $roomtype = $_POST['roomtype'];
        $isavailable = $_POST['isavailable'];
        $reservationid = $_POST['reservationid'];

        // $data = array(
        //     'room_number' => $roomnum,
        //     'room_type' => $roomtype,
        //     'is_available' => $isavailable,
        //     'reservation_id' => $reservationid,
        // );


        // $mysql_get_users = mysql_query("SELECT * FROM room WHERE room_id = '$roomnum' AND is_available = '0'");
        // $num = mysqli_num_rows(mysqli_query($link, "SELECT * FROM room WHERE room_id = '$roomnum' AND is_available = '0'"));
        // $query = mysqli_query($connect, "SELECT * FROM room WHERE room_id = '$roomnum' AND is_available = '0'");
        // $num = mysqli_num_rows($query);

        // $get_rows = mysql_affected_rows($connect);

        // if ($num >= 1) {
        //     echo "<script>alert('Room is not available');window.location.href=document.referrer;</script>";
        // } else {
            $sql = "UPDATE room SET room_type = '$roomtype', is_available = '$isavailable', reservation_id = '$reservationid' WHERE room_id = '$roomnum'";
        // $sql = "INSERT INTO room (room_type, is_available, reservation_id) VALUES ('$roomtype', '$isavailable', '$reservationid')";

        $query = mysqli_query($connect, $sql);

            if ($query) {
                $connect->close();
                echo "<script>alert('Successfully accommodated');window.location.href=document.referrer;</script>";
                die();
            } else {
                $connect->close();
                echo "<script type='text/javascript'>alert('Server is busy!');window.location.href=document.referrer;</script>";
            }
            $connect->close();
        // }

    }
    $connect->close();
?>