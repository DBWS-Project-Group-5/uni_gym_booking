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
    echo $member_exp_date;
    $stmt_member = $conn->prepare("INSERT INTO members (mail, members_name, members_expiry_date) VALUES (?, ?, FROM_UNIXTIME(?));");
    //$sql = "INSERT INTO members (mail, members_name, members_expiry_date) VALUES ($ml, $nm, $date)";

    $stmt_member->bind_param('ssi', $member_mail, $member_name, $member_expiry_date);
    if(!$stmt_member->execute()){
        header("http://clabsql.clamv.jacobs-university.de/~nibragimov/uni_gym_booking/project/status.php?status=error&table=members");
        $stmt_member->close();
        exit();
    }
    $stmt_member->close();
    // if ($conn->query($sql) === TRUE) {
    //     echo "Insertion successfull";
    // } else {
    //     echo "Error inserting into table: " . $conn->error;
    // }

    // if($membership_type == "gym_member"){
    //     $stmt_gym = $conn->prepare("INSERT INTO gym_members (members_mail) VALUES (?);");
    //     $stmt_gym->bind_param('s', $member_mail);
    //     if(!$stmt_gym->execute()){
    //         header("http://clabsql.clamv.jacobs-university.de/~nibragimov/uni_gym_booking/project/status.php?status=error&table=gym_members");
    //         $stmt_gym->close();
    //         exit();
    //     }
    //     else{
    //         header("http://clabsql.clamv.jacobs-university.de/~nibragimov/uni_gym_booking/project/status.php?status=success&table=gym_members_and_members");
    //     }
    //     $stmt_gym->close();
    // }
    // else if($membership_type == "pool_member"){
    //     $stmt_pool = $conn->prepare("INSERT INTO pool_members (members_mail) VALUES (?);");
    //     $stmt_pool->bind_param('s', $member_mail);
    //     if(!$stmt_pool->execute()){
    //         header("http://clabsql.clamv.jacobs-university.de/~nibragimov/uni_gym_booking/project/status.php?status=error&table=pool_members");
    //         $stmt_pool->close();
    //         exit();
    //     }else{
    //         header("http://clabsql.clamv.jacobs-university.de/~nibragimov/uni_gym_booking/project/status.php?status=success&table=pool_members_and_members");
    //     }
    //     $stmt_pool->close();
    // }
    $conn->close();