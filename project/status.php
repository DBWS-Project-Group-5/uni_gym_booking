<?php
    if($_GET['status']=="error"){
        $table = $_GET['table'];
        echo "<h1>Error: Insertion to $table failed</h1>";
    }
    else{
        $table = $_GET['table'];
        echo "<h1>Success: Your data was successfully inserted to the $table table(s)</h1>";
    }