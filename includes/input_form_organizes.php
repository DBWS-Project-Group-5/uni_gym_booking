<?php
    require('../includes/config.php');

    $stmt_event = $conn->prepare("SELECT * FROM event WHERE event_name=?");
    $stmt_event->bind_param("s", $event_name);
    $event_name = $_POST['event_name'];
    
    $stmt_event->execute();
    $result = $stmt_event->get_result();

    while($row = $result->fetch_assoc()){
        $event_id = $row['id'];
    }
    //echo $event_id;
    $stmt_event->close();

    $stmt_organizes = $conn->prepare("INSERT INTO organizes (staff_mail, event_id) VALUES (?, ?);");
    $stmt_organizes->bind_param('si', $staff_mail, $event_id);
    $staff_mail = $_POST['staff_mail'];
    
    //printf("\n%s %d\n", $staff_mail, $event_id);
    if(!$stmt_organizes->execute()){
        header("Location: ../project/status.php?status=error&table=organizes");
        $stmt_organizes->close();
        exit();
    }
    else{
        header("Location: ../project/status.php?status=success&table=organizes_and_event");
    }
    $stmt_organizes->close();

    $conn->close();
?>