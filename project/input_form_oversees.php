<?php
    require('../includes/config.php');

    $mem_mail = $_POST['member_mail'];
    $staff_mail = $_POST['staff_mail'];
    
    $stmt_oversees = $conn->prepare("INSERT INTO oversees (member_mail, staff_mail) VALUES (?, ?);");
    $stmt_oversees->bind_param('sis', $mem_mail, $staff_mail);
    $stmt_oversees->execute();
    $stmt_oversees->close();

    $conn->close();

?>