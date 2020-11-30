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
    
    <body>
        <div class="container">
            <div class="row fullheight align-items-center">
                <div class="col-sm-4 mx-auto">
                    <h2>Came_in_date input form</h2>
                    <form method="post" action="../includes/input_form_came_in_date.php">
                        <p><label>Start Time: </label></label><input type="time" name="came_in_start_time" placeholder="Input start time" autofocus required></p>
                        <p><label>End Time: </label></label><input type="time" name="came_in_end_time" placeholder="Input end time" required></p>
                        <p><select name="came_in_status">
                            <option value="status_0">Signed in</option>
                            <option value="status_1">Out of time</option>
                            <option value="status_2">Signed out</option>
                        </select></p>
                        <p><input type="text" name="came_in_mail" placeholder="Input mail" required></p>
                        <button class="btn btn-primary" type="submit" name="came_in_submit_btn">Submit data</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>