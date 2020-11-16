<?php
    session_start();
    if(!isset($_SESSION['user_name'])){
        header("Location:../project/login_page.php?error=mismatch");
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
    $page = 10;
    $access_stmt->bind_param("ssi", $host, $agents, $page);

    if(!$access_stmt->execute()){
      $access_stmt->close();
      $conn->close();
      exit(1);
    }
    $access_stmt->close();
    $conn->close();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>link_page | Bookr</title>
    <link href="assets/styles.css" rel="stylesheet">
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
      crossorigin="anonymous"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;1,700&display=swap"
      rel="stylesheet"
    />
  </head>

    
    <body>

        <!-- Navbar or menu -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <!-- Brand and link to home -->
          <a class="navbar-brand mx-5 st-a-brand" href="index.html">
            <img src="assets/brand.svg" width="30" height="30" class="d-inline-block align-top" alt="bookr-logo" loading="lazy">
            Bookr
          </a>
        
          <!-- <a class="navbar-brand mx-5 st-a-brand" href="#">Bookr</a> -->
          <!-- toggler for mobile -> opens the navbar -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <!-- icon of toggler button -->
            <span class="navbar-toggler-icon"></span>
          </button>
          <!-- responsive navigation -->
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- set the navbar items positioning -->
            <ul class="navbar-nav ml-auto">
              
              <li class="nav-item mx-5">
                <a class="nav-link" href="#">About</a>
              </li>
              <li class="nav-item mx-5">
                <a class="nav-link" href="#">Events</a>
              </li>
              <li class="nav-item mx-5">
                <a class="nav-link" href="#">Contact</a>
              </li>
            </ul>
          </div>
        </nav>

        <div class="container">
          <div class="row fullheight">
            <div class="col-sm-4">

            
              <!--entities-->
              <a href="input_form_booking.php">booking</a><br>
              <a href="input_form_came_in_date.php">came_in_date</a><br>
              <a href="input_form_members.php">members</a><br>
              <a href="input_form_staff.php">staff</a><br>
              <a href="input_form_manager.php">Manager</a><br>
              <a href="input_form_event.php">events</a><br>

              <!--relations-->
              <a href="input_form_sign_in.php">sign in</a><br>
              <a href="input_form_oversees.php">oversees</a><br>
              <a href="input_form_organizes.php">organizes</a><br>
              </div>
            </div>
        </div> 

        


        <div class="container-fluid">
          <div class='row footer d-flex flex-sm-row flex-column'>
              <div class="col-sm-4">
                  <div class="pl-5 pt-2">
                    <b>Links</b><br>
                    <a href="#">Contact</a><br>
                    <a href="#">About Us</a><br>
                    <a href="Imprint.html">Imprint</a><br>
                    <a href="link_page.php">link page</a><br>
                    <a href="login_page.php">login page</a><br>
                    <a href="search_link_page.html">Search link page</a><br>
                    
                  </div>
              </div>
              <div class="col-sm-4">
                  <div class="pl-5 pt-2">
                    <b>Regulations</b><br>
                    <b>Pool</b>
                    <ul>
                        <li>Health and hygine</li>
                    </ul>
                    <b>Gym</b>
                    <ul>
                        <li>Health and hygine</li>
                    </ul>
                  </div>
              </div>
              <div class="col-sm-4">
                <div class="pl-5 pt-2">
                  <b>Contact Us</b>
                  <p>Jacobs University Bremen GmbH</p>
                  <p>Campus Ring 1</p>
                  <p>28759 Bremen, Germany</p>
                  <p>+4942120040</p>
                  <a href='#'>campuslife@jacobs-university.de</a><br/>
                  <a href='#'>something@jacobs-university.de</a>
                </div>
              </div>
              <div class="container-fluid">
                <div class="row">
                  <p class='bookr mx-auto'>&copy; 2020 Bookr</p>
                </div>
              </div>
            </div>
        </div>
        
    </body>

</html>