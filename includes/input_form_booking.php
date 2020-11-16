<?php
    require('../includes/config.php');

    $stmt_timetable = $conn->prepare("INSERT INTO timetable (mail) VALUES (?);");
    $stmt_timetable->bind_param('s', $mail);
    
    $mail = $_POST['booking_mail'];

    if(!$stmt_timetable->execute()){
        header("Location: ../project/status.php?status=error&table=timetable");
        exit();
    }
    $id = $conn->insert_id;
    $stmt_timetable->close();

    
    $stmt_booking = $conn->prepare("INSERT INTO booking (book_time, timetable_id) VALUES (FROM_UNIXTIME(?), ?);");
    $stmt_booking->bind_param('ii', $time, $id);
    
    $time = $_POST['booking_time'];
    //create a UNIX timestamp for mysql table
    $time = explode(':', $time);
    if(count($time) == 2){
        list($h, $m) = $time;
        $today_date = mktime($h, $m, 0, date("m"), date("d"), date("Y"));
    }
    if($stmt_booking->execute()){
        header("Location: ../project/status.php?status=error&table=booking");
    }
    else{
        header("Location: ../project/status.php?status=success&table=timetable_and_booking");
    }
    $stmt_booking->close();

    $conn->close();
    exit();
?>