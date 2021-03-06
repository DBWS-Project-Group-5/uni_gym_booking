<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/styles.css">
    <title>Home | Bookr</title>
  </head>
  <body>
    <!-- <h1>Hello, world!</h1> -->
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper)-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> 
    
    
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
          <li class="nav-item mx-5">
            <a class="nav-link" href="link_page.html">Maintenance Page</a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container">
        <div class="row mt-4 justify-content-center">
          <p>Please login to the site</p>
        </div>
        <div class="row mt-4 justify-content-center">
        <?php
            if(isset($_GET['error'])){
                if($_GET['error']==='invalid'){
                    echo "<div class='alert alert-danger' role='alert'>Invalid Username/Password</div>";
                }
                else{
                    echo "<div class='alert alert-danger' role='alert'>Unathorized Access! Please do not attempt it!</div>";
                }
            }
        ?>
        </div>
        <div class="row fullheight mt-1 justify-content-center">
            
            <form method="post" action="../includes/login.php">
                <div class="form-group">
                    <label for="loginFormLogin">Login</label>
                    <input type="text" class="form-control" name="u_name" id="loginFormLoginInput" required maxlength="40" placeholder="username@jub.de">
                </div>
                <div class="form-group">
                    <label for="loginFormPassword">Password</label>
                    <input type="password" class="form-control" name="pwd" id="loginFormLoginPass" required placeholder="Your password">
                </div>  
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Sign in</button>
                </div>
            </form>

        </div>
    </div>

    <div class="container-fluid py-4">
        <div class='row footer d-flex flex-sm-row flex-column'>
            <div class="col-sm-4">
                <div class="pl-5 pt-2">
                  <b>Links</b><br>
                  <a href="#">Contact</a><br>
                  <a href="map.php">Map</a><br>
                  <a href="Imprint.html">Imprint</a><br>
                  <a href="link_page.php">link page</a><br>
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