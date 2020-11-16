<?php
    require('../includes/config.php');

    $stmt_staff = $conn->prepare("INSERT INTO staff (mail, staff_name, hours_worked) VALUES (?, ?, ?);");
    $stmt_staff->bind_param("ssi", $manager_mail, $manager_name, $hours_worked);
    

    $manager_mail = $_POST['m_mail'];
    $manager_name = $_POST['m_name'];
    $hours_worked = $_POST['hours_worked'];
    //print_r($_POST);
    if(!$stmt_staff->execute()){
        //header("location: ../project/status.php?status=error&table=staff");

        $stmt_staff->close();
        exit();
    }
    $stmt_staff->close();

    $stmt_manager = $conn->prepare("INSERT INTO manager (staff_mail) VALUES (?);");
    $stmt_manager->bind_param('s', $manager_mail);
    $manager_mail = $_POST['mail'];

    if(!$stmt_manager->execute()){
        header("location: ../project/status.php?status=error&table=manager");
        $stmt_manager->close();
        exit();
    }
    else{
        header("location: ../project/status.php?status=success&table=manager_and_staff");
    }
    $stmt_manager->close();
    
    

    $conn->close();
?>