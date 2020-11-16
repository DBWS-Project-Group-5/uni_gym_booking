<?php
    require('../includes/config.php');
    $login_stmt = $conn->prepare("SELECT * from user_management WHERE email=? AND pwd=?");
    $login_stmt->bind_param("ss", $u_name, $pwd);

    $u_name = $_POST['u_name'];
    $pwd = $_POST['pwd'];

    $login_stmt->execute();

    $result = $login_stmt->get_result();
    session_start();
    
    while($row = $result->fetch_assoc()){
        //session_start();
        $_SESSION["user_name"] = $u_name;
        header("Location: ../project/link_page.php");
        $login_stmt->close;
        $conn->close;
        exit();
    }
    //if you logged in with error, clear session
    if(isset($_SESSION['user_name'])){
        session_destroy();
    }
    header("Location: ../project/login_page.php?error=invalid");
    $login_stmt->close;
    $conn->close;
