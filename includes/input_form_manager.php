<?php
    require('../includes/config.php');

    $stmt_staff = $conn->prepare("INSERT INTO staff (mail, staff_name, hours_worked) VALUES (?, ?, ?);");
    $stmt_staff->bind_param("ssi", $manager_mail, $manager_name, $hours_worked);
    $manager_mail = $_POST['mail'];
    $manager_name = $_POST['name'];
    $hours_worked = (int)$_POST['hours_worked'];
    if(!$stmt_staff->execute()){
        header("location:http://clabsql.clamv.jacobs-university.de/~nibragimov/uni_gym_booking/project/status.php?status=error&table=staff");
        $stmt_staff->close();
        exit();
    }
    $stmt_staff->close();

    $stmt_manager = $conn->prepare("INSERT INTO manager (staff_mail) VALUES (?);");
    $stmt_manager->bind_param('s', $manager_mail);
    $manager_mail = $_POST['mail'];

    if(!$stmt_manager->execute()){
        header("location:http://clabsql.clamv.jacobs-university.de/~nibragimov/uni_gym_booking/project/status.php?status=error&table=manager");
        $stmt_manager->close();
        exit();
    }
    else{
        header("location:http://clabsql.clamv.jacobs-university.de/~nibragimov/uni_gym_booking/project/status.php?status=success&table=manager_and_staff");
    }
    $stmt_manager->close();
    
    

    $conn->close();
?>