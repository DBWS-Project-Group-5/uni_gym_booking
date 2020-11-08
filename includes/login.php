<?php
    require('./config.php');
    $login_stmt = $config->prepare("SELECT * from user_management WHERE email=? AND pwd=?");
    $login_stmt->bind_param("ss", $u_name, $pwd);

    $u_name = $_POST['u_name'];
    $pwd = $_POST['pwd'];

    $login_stmt->execute();

    $result = $login_stmt->get_result();

    while($row = $result->fetch_assoc()){
        session_start();
        $_SESSION["user_name"] = $u_name;
        header("Location:http://clabsql.clamv.jacobs-university.de/~nibragimov/uni_gym_booking/project/link_page.html");
        $login_stmt->close;
        $conn->close;
        exit();
    }
    header("Location:http://clabsql.clamv.jacobs-university.de/~nibragimov/uni_gym_booking/project/login_page.php?error=mismatch");
    $login_stmt->close;
    $conn->close;