<?php 

    $host_name = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "noticeboard";

    // Create Connection 

    $mysqli = new mysqli(hostname:$host_name,
                         username:$db_user,
                         password:$db_pass,
                         database:$db_name);

    // Check Connection 

    if($mysqli->connect_errno) {
        die("Connection Failed! " . $mysqli->connect_error);
    }
?>