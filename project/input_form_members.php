<?php
    require('../includes/config.php');

    $member_mail = $_POST['member_mail'];
    $member_name = $_POST['member_name'];
    $member_exp_date = $_POST['member_exp_date'];
    $membership_type = $_POST['membership_type'];

    $member_exp_date = explode('-', $member_exp_date);
    if(count($member_exp_date) == 3){
        list($y, $m, $d) = $member_exp_date;
        $member_exp_date = mktime(0, 0, 0, $m, $d, $y);
    }
        
    $stmt_member = $conn->prepare("INSERT INTO members (mail, members_name, members_expiry_date) VALUES (?, ?, ?);");
    $stmt_member->bind_param('ssi', $member_mail, $member_name, $member_expiry_date);
    $stmt_member->execute();
    $stmt_member->close();

    if($membership_type == "gym_member"){
        $stmt_gym = $conn->prepare("INSERT INTO gym_members (members_mail) VALUES (?);");
        $stmt_gym->bind_param('s', $member_mail);
        $stmt_gym->execute();
        $stmt_gym->close();
    }
    else if($membership_type == "pool_member"){
        $stmt_pool = $conn->prepare("INSERT INTO pool_members (members_mail) VALUES (?);");
        $stmt_pool->bind_param('s', $member_mail);
        $stmt_pool->execute();
        $stmt_pool->close();
    }
    $conn->close();