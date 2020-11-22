<?php
    require_once('config.php');
    
    $q = $_GET["term"];
    //echo $q;
    $q = $conn->real_escape_string($q);
    $query = "SELECT mail FROM members WHERE mail LIKE '$q%'";
    $stmt_members = $conn->query($query);
    $arr_1 = array();

    while($row_1 = $stmt_members->fetch_assoc()){
        $arr_1[] = array( 
            "label" => $row_1['mail'],
            "value" => $row_1['mail']
        );
    }
   
    
    echo json_encode($arr_1);
    $stmt_members->close();
    $conn->close();
?>