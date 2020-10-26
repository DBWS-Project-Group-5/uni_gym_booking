<?php
    require('../includes/config.php');

    $member_mail = $_POST['member_mail'];
    $time_type = $_POST['time_type'];

    $stmt_event = $conn->prepare("INSERT INTO event (event_name, event_date, content) VALUES (?, ?, ?);");
    $stmt_event->bind_param('sis', $event_name, $event_date, $event_content);
    $stmt_event->execute();
    $stmt_event->close();

    $conn->close();

?>