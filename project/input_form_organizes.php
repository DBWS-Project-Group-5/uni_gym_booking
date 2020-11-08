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
                    <h2>Organizes input form</h2>
                    <form method="post" action="../includes/input_form_organizes.php">
                        <!-- Get a list of staff mails. Below are examples -->
                        <p><select name="staff_mail">
                            <option value="rome@jacobs-university.de">rome@jacobs-university.de</option>
                            <option value="hmaas@jacobs-university.de">hmaas@jacobs-university.de</option>
                            <option value="schoenw@jacobs-university.de">schoenw@jacobs-university.de</option>
                        </select></p>
                        <!-- Get a list of event name. Event name is unique. Below are examples -->
                        <p><select name="event_name">
                            <option value="Art fest">Art fest</option>
                            <option value="Dancestoned">Dancestoned</option>
                            <option value="Swimming competition">Swimming competition</option>
                        </select></p>
                        <button class="btn btn-primary" type="submit" name="oversees_submit_btn">Create Relationship</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>