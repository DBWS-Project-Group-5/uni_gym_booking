<?php
    require('../includes/config.php');

    $time = $_POST['booking_time'];
    $mail = $_POST['booking_mail'];

    //create a UNIX timestamp for mysql table
    $time = explode(':', $time);
    if(count(time) == 2){
        list($s, $m) = $time;
        $today_date = mktime();
        $time = $today_date + $m * 60 + $s;
    }
    
    $stmt_timetable = $conn->prepare("INSERT INTO timetable (mail) VALUES (?);");
    $stmt_timetable->bind_param('s', $mail);
    $stmt_timetable->execute();
    $stmt_timetable->close();

    $stmt_booking = $conn->prepare("INSERT INTO booking (book_time) VALUES (?);");
    $stmt_booking->bind_param('i', $time);
    $stmt_booking->execute();
    $stmt_booking->close();

    $conn->close();

?>