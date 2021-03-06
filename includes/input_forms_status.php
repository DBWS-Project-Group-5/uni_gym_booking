
<!DOCTYPE html>
<html>
  <head>
    <title>Congrats! | Bookr</title>
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
          <a class="navbar-brand mx-5 st-a-brand" href="#">
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


        <div class="container-fluid">
            <div class="row fullheight align-items-center" style="background-color:lightblue;">
                <div class="col-sm-2"></div>
                <div class="col-sm-4">
                    <h1>Congrats! ^o^</h1>
                    <p>process was successful</p>
                </div>
                <div class="col-sm-6">
                    <img src="assets/celebrate.gif" class="rounded" alt="dead com" width="304" height="236">
                </div>
            </div>
        </div>


        <?php
            if($_GET['status']==200){
                echo "<h1>Successful Insertion to the database</h1>";
            }
            else{
                echo "<h1>Error: Unsucessful Insertion to the database</h1>";
            }
        ?>


        <div class="container-fluid">
          <div class='row footer d-flex flex-sm-row flex-column'>
              <div class="col-sm-4">
                  <div class="pl-5 pt-2">
                    <b>Links</b><br>
                    <a href="#">Contact</a><br>
                    <a href="#">About Us</a><br>
                    <a href="#">Imprint</a><br>
                    <a href="#">link page</a><br>
                    <a href="#">FAQs</a><br>
                    
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