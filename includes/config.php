<?php
// define("DB_HOST",'10.72.1.14');
// define("DB_USERNAME",'group5');
// define("DB_PASSWORD",'hz2aAr');
$servername = '10.72.1.14';
$username = "group5";
$password = "hz2aAr";
$dbname = "group5";
date_default_timezone_set("Europe/Berlin");


$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}
//echo "Connected Sucessfully";
?>