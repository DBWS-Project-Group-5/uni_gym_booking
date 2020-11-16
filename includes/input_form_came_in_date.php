<?php
    require('../includes/config.php');

    $stmt_timetable = $conn->prepare("INSERT INTO timetable (mail) VALUES (?);");
    $stmt_timetable->bind_param('s', $mail);

    $mail = $_POST['came_in_mail'];

    if(!$stmt_timetable->execute()){
        header("location: ../project/status.php?status=error&table=timetable");
        $stmt_timetable->close();
        $conn->close();
        exit();
    }
    $id = $conn->insert_id;
    $stmt_timetable->close();

    

    $stmt_came_in_date = $conn->prepare("INSERT INTO came_in_date (start_time, end_time, came_in_status, id_came_in_date)
    VALUES (FROM_UNIXTIME(?), FROM_UNIXTIME(?), ?, ?);");
    $stmt_came_in_date->bind_param('iiii', $start_time, $end_time, $status, $id);

    $start_time = $_POST['came_in_start_time'];
    $end_time = $_POST['came_in_end_time'];
    $status = $_POST['came_in_status'];
    printf("%s\n", $start_time);
    printf("%s\n", $end_time);
    if($status =='status_0'){
        $status = 0;
    }
    else if($status == 'status_1'){
        $status = 1;
    }
    else{
        $status = 2;
    }

    $start_time = explode(':', $start_time);
    if(count($start_time) == 2){
        list($h, $m) = $start_time;
        $start_time = mktime($h, $m, 0, date("m"), date("d"), date("Y"));
        //$start_time = $today_date + $h * 60 + $m;
    }

    $end_time = explode(':', $end_time);
    if(count($end_time) == 2){
        list($h, $m) = $end_time;
        $end_time = mktime($h, $m, 0, date("m"), date("d"), date("Y"));
    }
    if(!$stmt_came_in_date->execute()){
        header("location: ../project/status.php?status=error&table=timetable_and_came_in_date");
    }
    else{
        header("location: ../project/status.php?status=success&table=timetable_and_came_in_date");
    }

    $stmt_came_in_date->close();
    $conn->close();
    exit();
?>