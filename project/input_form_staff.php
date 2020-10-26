<?php
    require('../includes/config.php');
    $staff_mail = $_POST['staff_mail'];
    $staff_name = $_POST['staff_name'];
    $hours_worked = $_POST['staff_hours_worked'];
    $staff_type = $_POST['staff_type'];

    $stmt_member = $conn->prepare("INSERT INTO staff (mail, staff_name, hours_worked) VALUES (?, ?, ?);");
    $stmt_member->bind_param('ssi', $staff_mail, $staff_name, $staff_hours_worked);
    $stmt_member->execute();
    $stmt_member->close();

    if($staff_type == "gym_staff"){
        $stmt_gym = $conn->prepare("INSERT INTO gym_staff (staff_mail) VALUES (?)");
        $stmt_gym->bind_param('s', $staff_mail);
        $stmt_gym->execute();
        $stmt_gym->close();
    }
    if($staff_type == "pool_staff"){
        $stmt_pool = $conn->prepare("INSERT INTO pool_staff (staff_mail) VALUES (?)");
        $stmt_pool->bind_param('s', $staff_mail);
        $stmt_pool->execute();
        $stmt_pool->close();
    }
    $conn->close();
?>