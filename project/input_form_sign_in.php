<?php
    session_start();
    if(!isset($_SESSION['user_name'])){
        header("Location:http://clabsql.clamv.jacobs-university.de/~nibragimov/uni_gym_booking/project/login_page.php?error=mismatch");
        exit();
    }
    require("../includes/config.php");
  
    $access_stmt = $conn->prepare("INSERT INTO web_log (ip, browsers, web_page) VALUES (?, ?, ?)");
    
    foreach(getallheaders() as $key => $value){
        if($key === "Host"){
        $host = $key;
        }
        elseif($key === "User-Agent"){
        $agents = $key;
        }
    }
    $page = 8;
    $access_stmt->bind_param("ssi", $host, $agents, $page);

    if(!$access_stmt->execute()){
        $access_stmt->close();
        $conn->close();
        exit(1);
    }
    $access_stmt->close();
    $conn->close();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/styles.css">
    </head>
    <!-- Bootstrap JS and JQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> 
    <?php

        require('../includes/config.php');
        $stmt_members = $conn->query("SELECT mail FROM members");
        $arr_1 = array();
        while($row_1 = $stmt_members->fetch_assoc()){

            $arr_1[] = $row_1;
        }
        if(!$arr_1){
            //var_dump($arr_1);
            header("location: ../project/status.php?status=error&table=oversees");
            $stmt_members->close();
            exit();
        }
        $stmt_members->close();
        
        $conn->close();
    ?>
    <body>
        <div class="container">
            <div class="row fullheight align-items-center">
                <div class="col-sm-4 mx-auto">
                    <h2>Sign in input form</h2>
                    <form method="post" action="../includes/input_form_sign_in.php">
                        <!-- Get a list of members mails. Below are examples -->
                        <p><select name="member_mail">
                            <?php 
                                foreach($arr_1 as $row){
                                    echo "<option value='". $row['mail'] . "'>" . $row["mail"] . "</option>";
                                }
                            ?>
                        </select></p>
                        <p><select name="time_type">
                            <option value="booking">Booking</option>
                            <option value="came_in_date">Came in date</option>
                        </select></p>
                        <button class="btn btn-primary" type="submit" name="signin_submit_btn">Create Relationship</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>