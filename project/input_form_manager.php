<?php
    require('../includes/config.php');

    $manager_mail = $_POST['manager_mail'];
    $manager_name = $_POST['manager_name'];
    $hours_worked = $_POST['manager_hours_worked'];

    $stmt_manager = $conn->prepare("INSERT INTO manager (staff_mail) VALUES (?);");
    $stmt_manager->bind_param('s', $manager_mail);
    $stmt_manager->execute();
    $stmt_manager->close();

    $stmt_staff = $conn->prepare("INSERT INTO staff (mail, staff_name, hours_worked) VALUES (?, ?, ?);");
    $stmt_staff->bind_param("ssi", $manager_mail, $manager_name, $hours_worked);
    $stmt_staff->execute();
    $stmt_staff->close();

    $conn->close();
?>