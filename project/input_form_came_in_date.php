<?php
    require('../includes/config.php');

    $start_time = $_POST['came_in_start_time'];
    $end_time = $_POST['came_in_end_time'];
    $mail = $_POST['came_in_mail'];
    $status = $_POST['came_in_status'];

    $start_time = explode(':', $start_time);
    if(count($start_time) == 2){
        list($s, $m) = $start_time;
        $today_date = mktime();
        $start_time = $today_date + $m * 60 + $s;
    }

    $end_time = explode(':', $end_time);
    if(count($end_time) == 2){
        list($s, $m) = $end_time;
        $today_date = mktime();
        $end_time = $today_date + $m * 60 + $s;
    }

    $stmt_timetable = $conn->prepare("INSERT INTO timetable (mail) VALUES (?);");
    $stmt_timetable->bind_param('s', $mail);
    if(!$stmt_timetable->execute()){
        header("http://clabsql.clamv.jacobs-university.de/~nibragimov/uni_gym_booking/project/status.php?status=error&table=timetable");
        $stmt_timetable->close();
        exit();
    }
    $stmt_timetable->close();

    if($status =='status_0'){
        $status = 0;
    }
    else if($status == 'status_1'){
        $status = 1;
    }
    else{
        $status = 2;
    }
    $stmt_came_in_date = $conn->prepare("INSERT INTO came_in_date (start_time, end_time, came_in_status) VALUES (FROM_UNIXTIME(?),
     FROM_UNIXTIME(?), ?);");
    $stmt_came_in_date->bind_param('iii', $start_time, $end_time, $status);
    if(!$stmt_came_in_date->execute()){
        header("http://clabsql.clamv.jacobs-university.de/~nibragimov/uni_gym_booking/project/status.php?status=error&table=timetable_and_came_in_date");
    }
    else{
        header("http://clabsql.clamv.jacobs-university.de/~nibragimov/uni_gym_booking/project/status.php?status=success&table=timetable_and_came_in_date");
    }
    $stmt_came_in_date->close();

    $conn->close();
    exit();
?>