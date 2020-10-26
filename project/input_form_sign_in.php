<?php
    require('../includes/config.php');

    $member_mail = $_POST['member_mail'];
    $time_type = $_POST['time_type'];

    $stmt_timetable = $conn->prepare("SELECT * FROM timetable WHERE mail=?;");
    $stmt_timetable->bind_param('s', $member_mail);
    $arr = $stmt_timetable->execute()->fetch_assoc();

    if($arr == NULL){
        $err_msg = "No members_mail in timetable";
        $stmt_timetable->close();
        $conn->close();
        // redirect to error.html with err_msg; 
    }
    $timetable_id = $arr['id'];
    $stmt_timetable->close();

    $stmt_signin = $conn->prepare("INSERT INTO sign_in (members_mail, timetable_id) VALUES (?, ?);");
    $stmt_signin->bind_param('ss', $member_mail, $timetable_id);
    $stmt_signin->execute();
    $stmt_signin->close();

    $conn->close();

?>