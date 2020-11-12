<?php
    session_start();
    if(!isset($_SESSION['user_name'])){
        header("Location:http://clabsql.clamv.jacobs-university.de/~nibragimov/uni_gym_booking/project/login_page.php?error=mismatch");
        exit();
    }
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
         $stmt_staff = $conn->query("SELECT mail FROM staff");
         $arr_1 = array();
         while($row_1 = $stmt_staff->fetch_assoc()){
             $arr_1[] = $row_1;
         }
         if(!$arr_1){
             //var_dump($arr_1);
             header("Location: ../project/status.php?status=error&table=organizes");
             $stmt_staff->close();
             exit();
         }
         $stmt_staff->close();

         $stmt_event = $conn->query("SELECT event_name FROM event");
         
         $arr_2 = array();
         while($row_2 = $stmt_event->fetch_assoc()){
             $arr_2[] = $row_2;
         }
         if(!$arr_2){
             //var_dump($arr_1);
             header("Location: ../project/status.php?status=error&table=organizes");
             $stmt_event->close();
             exit();
         }
         $stmt_event->close();
         $conn->close();
     
    
    ?>
    <body>
        <div class="container">
            <div class="row fullheight align-items-center">
                <div class="col-sm-4 mx-auto">
                    <h2>Organizes input form</h2>
                    <form method="post" action="../includes/input_form_organizes.php">
                        <!-- Get a list of staff mails. Below are examples -->
                        <p><select name="staff_mail">
                            <?php 
                                foreach($arr_1 as $row){
                                    echo "<option value='". $row['mail'] . "'>" . $row["mail"] . "</option>";
                                }
                            ?>
                        </select></p>
                        <!-- Get a list of event name. Event name is unique. Below are examples -->
                        <p><select name="event_name">
                            <?php 
                                foreach($arr_2 as $row){
                                    echo "<option value='". $row['event_name'] . "'>" . $row["event_name"] . "</option>";
                                }
                            ?>
                        </select></p>
                        <button class="btn btn-primary" type="submit" name="oversees_submit_btn">Create Relationship</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>