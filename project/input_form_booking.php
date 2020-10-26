<?php
    require('../includes/config.php');

    $time = $_POST['booking_time'];
    $mail = $_POST['booking_mail'];

    //create a UNIX timestamp for mysql table
    $time = explode(':', $time);
    if(count($time) == 2){
        list($s, $m) = $time;
        $today_date = mktime();
        $time = $today_date + $m * 60 + $s;
    }
    
    $stmt_timetable = $conn->prepare("INSERT INTO timetable (mail) VALUES (?);");
    $stmt_timetable->bind_param('s', $mail);
    if(!$stmt_timetable->execute()){
        header("http://clabsql.clamv.jacobs-university.de/~nibragimov/uni_gym_booking/project/status.php?status=error&table=timetable");
        exit();
    }
    $stmt_timetable->close();

    $stmt_booking = $conn->prepare("INSERT INTO booking (book_time) VALUES (FROM_UNIXTIME(?));");
    $stmt_booking->bind_param('i', $time);
    if($stmt_booking->execute()){
        header("http://clabsql.clamv.jacobs-university.de/~nibragimov/uni_gym_booking/project/status.php?status=error&table=booking");
    }
    else{
        header("http://clabsql.clamv.jacobs-university.de/~nibragimov/uni_gym_booking/project/status.php?status=success&table=timetable_and_booking");
    }
    $stmt_booking->close();

    $conn->close();
    exit();
?>