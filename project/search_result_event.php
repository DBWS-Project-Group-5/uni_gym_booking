<?php
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
$page = 16;
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
    <title>table | Bookr</title>
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
        
        <?php
          require('../includes/config.php');
          $stmt_event = $conn->prepare("SELECT id, event_name, event_date FROM event WHERE event_name=?");
          $stmt_event->bind_param('s', $event_name);
          $event_name = $_POST['event_name'];
          
          $stmt_event->execute();
          $arr = $stmt_event->get_result();
          $arr_1 = array();
          while($row_1 = $arr->fetch_assoc()){
              $arr_1[] = $row_1;
          }
          //var_dump($arr_1);
          if(!$arr_1){
              //var_dump($arr_1);
              echo "<h3>No match found :( </h3>";
              $stmt_event->close();
              exit();
          }
          $stmt_event->close();
          $conn->close();
        ?>
        
        <div class="row fullheight mt-5 justify-content-center">
          <div class="col-sm-8">
            <table class="table table-bordered table-striped">
            <thead>
                <tr>
                  <th scope="col">Event id</th>
                  <th scope="col">Event name</th>
                  <th scope="col">Event date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                  foreach($arr_1 as $row){
                    echo "<tr>";
                    echo "<th scope='row'>" . $row['id'] . "</th>";
                    printf("<td><a href='result_page.php?table=event&id=%d'>%s</a></td>", $row['id'], $row['event_name']);
                    echo "<td>" . $row['event_date'] . "</td>";
                    echo "</tr>";
                  }
                ?>
                <!-- <tr>
                  <th scope="row">Mark Jasper</th>
                  <td>m.jasper@jacobs-university.de</td>
                  <td>m.jasper@jacobs-university.de</td>
                </tr>
                <tr>
                  <th scope="row">Jacob Khan</th>
                  <td>j.khan@jacobs-university.de</td>
                  <td>m.jasper@jacobs-university.de</td>
                </tr>
                <tr>
                  <th scope="row">Jonny lee</th>
                  <td>j.lee@jacobs-university.de</td>
                  <td>m.jasper@jacobs-university.de</td>
                </tr> -->
            </tbody>
            </table>
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