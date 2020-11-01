<?php
    require('../includes/config.php');
    $staff_type = $_POST['staff_type'];

    $stmt_staff = $conn->prepare("INSERT INTO staff (mail, staff_name, hours_worked) VALUES (?, ?, ?);");
    $stmt_staff->bind_param('ssi', $staff_mail, $staff_name, $hours_worked);

    $staff_mail = $_POST['staff_mail'];
    $staff_name = $_POST['staff_name'];
    $hours_worked = $_POST['staff_hours_worked'];
    
    if(!$stmt_staff->execute()){
        header("location:http://clabsql.clamv.jacobs-university.de/~nibragimov/uni_gym_booking/project/status.php?status=error&table=staff");
        $stmt_staff->close();
        exit();
    }
    $stmt_staff->close();

    if($staff_type == "gym_staff"){
        $stmt_gym = $conn->prepare("INSERT INTO gym_staff (staff_mail) VALUES (?)");
        $stmt_gym->bind_param('s', $staff_mail);
        $staff_mail = $_POST['staff_mail'];
        if(!$stmt_gym->execute()){
            header("location:http://clabsql.clamv.jacobs-university.de/~nibragimov/uni_gym_booking/project/status.php?status=error&table=gym_staff");
            $stmt_staff->close();
            exit();
        }
        else{
            header("location:http://clabsql.clamv.jacobs-university.de/~nibragimov/uni_gym_booking/project/status.php?status=success&table=gym_staff");
        }
        $stmt_gym->close();
    }
    if($staff_type == "pool_staff"){
        $stmt_pool = $conn->prepare("INSERT INTO pool_staff (staff_mail) VALUES (?)");
        $stmt_pool->bind_param('s', $staff_mail);
        $staff_mail = $_POST['staff_mail'];
        if(!$stmt_pool->execute()){
            header("location:http://clabsql.clamv.jacobs-university.de/~nibragimov/uni_gym_booking/project/status.php?status=error&table=pool_staff");
            $stmt_pool->close();
            exit();
        }
        else{
            header("location:http://clabsql.clamv.jacobs-university.de/~nibragimov/uni_gym_booking/project/status.php?status=success&table=pool_staff");
        }
        $stmt_pool->close();
    }
    $conn->close();
?>