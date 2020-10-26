<?php
    require('../includes/config.php');

    $manager_mail = $_POST['manager_mail'];
    $manager_name = $_POST['manager_name'];
    $hours_worked = $_POST['manager_hours_worked'];

    $stmt_manager = $conn->prepare("INSERT INTO manager (staff_mail) VALUES (?);");
    $stmt_manager->bind_param('s', $manager_mail);
    if(!$stmt_manager->execute()){
        header("http://clabsql.clamv.jacobs-university.de/~nibragimov/uni_gym_booking/project/status.php?status=error&table=manager");
        $stmt_manager->close();
        exit();
    }
    $stmt_manager->close();

    $stmt_staff = $conn->prepare("INSERT INTO staff (mail, staff_name, hours_worked) VALUES (?, ?, ?);");
    $stmt_staff->bind_param("ssi", $manager_mail, $manager_name, $hours_worked);
    if(!$stmt_staff->execute()){
        header("http://clabsql.clamv.jacobs-university.de/~nibragimov/uni_gym_booking/project/status.php?status=error&table=staff");
        $stmt_staff->close();
        exit();
    }
    else{
        header("http://clabsql.clamv.jacobs-university.de/~nibragimov/uni_gym_booking/project/status.php?status=success&table=staff_and_manager");
    }
    $stmt_staff->close();

    $conn->close();
?>