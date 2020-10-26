<?php
    require('../includes/config.php');

    $event_date = $_POST['event_date'];
    $event_name = $_POST['event_name'];
    $event_content = $_POST['event_content'];

    //create a UNIX timestamp for mysql table
    $event_date = explode('/', $event_date);
    if(count($event_date) == 3){
        list($y, $m, $d) = $event_date;
        $event_date = mktime(0, 0, 0, $m, $d, $y);
    }
    
    $stmt_event = $conn->prepare("INSERT INTO event (event_name, event_date, content) VALUES (?, FROM_UNIXTIME(?), ?);");
    $stmt_event->bind_param('sis', $event_name, $event_date, $event_content);
    
    if(!$stmt_event->execute()){
        header("http://clabsql.clamv.jacobs-university.de/~nibragimov/uni_gym_booking/project/status.php?status=error&table=event");
        $stmt_event->close();
        exit();
    }
    else{
        header("http://clabsql.clamv.jacobs-university.de/~nibragimov/uni_gym_booking/project/status.php?status=success&table=event");
    }
    
    $stmt_event->close();

    $conn->close();
    exit();

?>