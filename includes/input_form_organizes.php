<?php
    require('../includes/config.php');

    $stmt_event = $conn->prepare("SELECT * FROM event WHERE event_name=?;");
    $stmt_event->bind_param("s", $event_name);
    $event_name = $_POST['event_name'];
    
    $stmt_event->execute();
    $result = $stmt_event->get_result();
    $stmt_event->close();

    $stmt_organizes = $conn->prepare("INSERT INTO organizes (staff_mail, event_id) VALUES (?, ?);");
    $stmt_organizes->bind_param('si', $staff_mail, $event_id);
    $staff_mail = $_POST['staff_mail'];
    while($row = $result->fetch_assoc()){
       $event_id = (int)$row['id'];
    }
    
    if(!$stmt_organizes->execute()){
        header("location:http://clabsql.clamv.jacobs-university.de/~nibragimov/uni_gym_booking/project/status.php?status=error&table=organizes");
        $stmt_organizes->close();
        exit();
    }
    else{
        header("location:http://clabsql.clamv.jacobs-university.de/~nibragimov/uni_gym_booking/project/status.php?status=success&table=organizes_and_event");
    }
    $stmt_organizes->close();

    $conn->close();
?>