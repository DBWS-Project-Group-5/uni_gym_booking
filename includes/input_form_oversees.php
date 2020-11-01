<?php
    require('../includes/config.php');
    $stmt_oversees = $conn->prepare("INSERT INTO oversees (members_mail, staff_mail) VALUES (?, ?);");
    $stmt_oversees->bind_param('ss', $mem_mail, $staff_mail);
    $mem_mail = $_POST['member_mail'];
    $staff_mail = $_POST['staff_mail'];
    if(!$stmt_oversees->execute()){
        header("location:http://clabsql.clamv.jacobs-university.de/~nibragimov/uni_gym_booking/project/status.php?status=error&table=oversees");
        $stmt_oversees->close();
        exit();
    }
    else{
        header("location:http://clabsql.clamv.jacobs-university.de/~nibragimov/uni_gym_booking/project/status.php?status=success&table=oversees");
    }
    $stmt_oversees->close();

    $conn->close();

?>