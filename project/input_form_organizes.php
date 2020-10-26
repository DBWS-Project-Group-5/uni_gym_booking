<?php
    require('../includes/config.php');

    $event_name = $_POST['event_name'];
    $event_content = $_POST['event_content'];
    $staff_mail = $_POST['staff_mail'];

    $stmt_event = $conn->prepare("SELECT * FROM event WHERE event_name=?;");
    $stmt_event->bind_param("s", $event_name);
    //fetch the event as an associative array
    $arr = $stmt_event->execute()->fetch_assoc();
    $event_id = $arr['id'];
    $stmt_event->close();

    $stmt_organizes = $conn->prepare("INSERT INTO organizes (staff_mail, event_id) VALUES (?, ?);");
    $stmt_organizes->bind_param('ss', $staff_mail, $event_id);
    if(!$stmt_organizes->execute()){
        header("http://clabsql.clamv.jacobs-university.de/~nibragimov/uni_gym_booking/project/status.php?status=error&table=organizes");
        $stmt_organizes->close();
        exit();
    }
    else{
        header("http://clabsql.clamv.jacobs-university.de/~nibragimov/uni_gym_booking/project/status.php?status=success&table=organizes_and_event");
    }
    $stmt_organizes->close();

    $conn->close();
?>