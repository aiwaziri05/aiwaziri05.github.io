<?php

    $host_name = "localhost";
    $user_name = "project_user";
    $password = "mypass123";
    $db_name = "noticeboard";

    // Create Connection

    $mysqli = new mysqli($host_name, $user_name, $password, $db_name);

    // Check Connection

    if($mysqli->connect_errno) {
        die("Connection Failed! " . $mysqli->connect_errno);
    }

    // echo "CONNECTED!";

?>