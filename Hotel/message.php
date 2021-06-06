<?php
include "function.php";
$connect = connectdb();

if(isset($_POST['newinquiry'])){
    $fullname = $_POST['uName'];
    $email = $_POST['uMail'];
    $subject = $_POST['uSubject'];
    $message = $_POST['uMessage'];
    // $birthdate = date('Y-m-d H:i:s', strtotime($_POST['birthdate']));

    $data = array(
        'fullname' => $fullname,
        'email' => $email,
        'subject' => $subject,
        'message' => $message,
    );

    $add = insert('inquiry', $data);

    if ($add) {
        //   header("location: index.php");
        // echo "<script type='text/javascript'>alert('Submitted successfully');</script>";
        echo "<script>alert('Submitted successfully');window.location.href='index.php';</script>";
        // echo "<script>console.log('New record created successfully');window.location.href=document.referrer;</script>";
        // header('Location: ' . $_SERVER['HTTP_REFERER']);

    } else {
        echo "<script>alert('An error occur!');</scipt>";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
?>