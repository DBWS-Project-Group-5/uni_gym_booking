<?php
    require_once('config.php');
    
    $q = $_GET["term"];
    //echo $q;
    $q = $conn->real_escape_string($q);
    $query = "SELECT event_name FROM event WHERE event_name LIKE '$q%'";
    $stmt_event = $conn->query($query);
    $arr_1 = array();

    while($row_1 = $stmt_event->fetch_assoc()){
        $arr_1[] = array( 
            "label" => $row_1['event_name'],
            "value" => $row_1['event_name']
        );
    }
   
    
    echo json_encode($arr_1);
    $stmt_event->close();
    $conn->close();
?>