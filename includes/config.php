<?php
define("DB_HOST",'10.72.1.14');
define("DB_USERNAME",'group5');
define("DB_PASSWORD",'hz2aAr');
date_default_timezone_set("Europe/Berlin");


$conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD);

if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}
echo "Connected Sucessfully";
?>