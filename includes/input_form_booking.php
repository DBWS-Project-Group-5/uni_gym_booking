<?php
    require('../includes/config.php');

    $stmt_timetable = $conn->prepare("INSERT INTO timetable (mail) VALUES (?);");
    $stmt_timetable->bind_param('s', $mail);
    
    $mail = $_POST['booking_mail'];

    if(!$stmt_timetable->execute()){
        header("location:http://clabsql.clamv.jacobs-university.de/~nibragimov/uni_gym_booking/project/status.php?status=error&table=timetable");
        exit();
    }
    $stmt_timetable->close();

    $stmt_booking = $conn->prepare("INSERT INTO booking (book_time) VALUES (FROM_UNIXTIME(?));");
    $stmt_booking->bind_param('i', $time);

    $time = $_POST['booking_time'];
    //create a UNIX timestamp for mysql table
    $time = explode(':', $time);
    if(count($time) == 2){
        list($s, $m) = $time;
        $today_date = mktime();
        $time = $today_date + $m * 60 + $s;
    }

    if($stmt_booking->execute()){
        header("location:http://clabsql.clamv.jacobs-university.de/~nibragimov/uni_gym_booking/project/status.php?status=error&table=booking");
    }
    else{
        header("location:http://clabsql.clamv.jacobs-university.de/~nibragimov/uni_gym_booking/project/status.php?status=success&table=timetable_and_booking");
    }
    $stmt_booking->close();

    $conn->close();
    exit();
?>