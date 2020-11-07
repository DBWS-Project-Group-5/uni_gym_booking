<?php
    require('../includes/config.php');
    session_start();
    $stmt_user = $conn->prepare("SELECT login, password FROM users WHERE login=? AND password=?");
    $stmt_user->bind_param('ss', $login, $password);
    $login = $_POST['login'];
    $password = $_POST['password'];
    $_SESSION['login'] = $login;
    // if(!ctype_alnum($_POST['login'])){
    //     header("Location: ../project/login.php?error=2");
    // }
 
    $stmt_user->execute();
    $arr = $stmt_user->get_result();

    if(!$row = $arr->fetch_assoc()){

        header("Location: ../project/login.php?error=1");
    }
    print_r($_SESSION);
    $stmt_user->close();
    $conn->close();
?>