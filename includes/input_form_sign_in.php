<?php
    require('../includes/config.php');

    $time_type = $_POST['time_type'];

    $stmt_timetable = $conn->prepare("SELECT * FROM timetable WHERE mail=?;");
    $stmt_timetable->bind_param('s', $member_mail);
    $member_mail = $_POST['member_mail'];
    $stmt_timetable->execute();
    $arr = $stmt_timetable->get_result();
    $count = 0;
    while($row = $arr->fetch_assoc()){
        print_r($row);
        $id = $row['id'];
        $count++;
    }
    $stmt_timetable->close();
   
    if($count==0){
        //error;
        exit();
    }

    //foreign key constraint fails
    $stmt_signin = $conn->prepare("INSERT INTO sign_in (members_mail, timetable_id) VALUES (?, ?);");
    $stmt_signin->bind_param('si', $member_mail, $timetable_id);
    $member_mail = $_POST['member_mail'];
    $timetable_id = $id;
    if(!$stmt_signin->execute()){
        header("location:http://clabsql.clamv.jacobs-university.de/~nibragimov/uni_gym_booking/project/status.php?status=error&table=sign_in");
        $stmt_signin->close();
        exit();
    }
    else{
        header("location:http://clabsql.clamv.jacobs-university.de/~nibragimov/uni_gym_booking/project/status.php?status=success&table=sign_in_and_timetable");
    }
    $stmt_signin->close();

    $conn->close();

?>