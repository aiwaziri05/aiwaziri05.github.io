<?php

    // Signup Validation

    if(empty($_POST["firstname"])) {
        die("Field is Required");
    }

    if(empty($_POST["lastname"])) {
        die("Field is Required");
    }

    if( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        die("Email is Required");
    }

    if($_POST["rank"] == "Select") {
        die("Please select a Rank");
    }
    
    if($_POST["dept"] == "Select") {
        die("Please select a Department");
    }
    
    if(empty($_POST["adress"])) {
        die("Adress is required");
    }

    if(strlen($_POST["password"]) < 8) {
        die("Password must be at least 8 characters");
    }

    if( ! preg_match("/[a-z]/i", $_POST["password"])) {
        die("Password must contain at least one letter");
    }

    if( ! preg_match("/[0-9]/i", $_POST["password"])) {
        die("Password must contain at least one number");
    }

    if($_POST["passwordConfirm"] !== $_POST["password"]) {
        die("Password must match");
    }

    // Password hash
    
    $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Require Database DIR

    $require = require_once "../CONFIG/db_connect.php";
    
    // Insert Into SQL

    // Generate user_id

    function random_id($length) {
        $text = "";

        $len = rand(8, $length);
        for($i = 1; $i < $len; $i++) {

            $text .= rand(0,9);
        }
        return $text;
    }

    $random_id = random_id(8);

    $sql = "INSERT INTO admins (user_id, first_name, last_name, email, rank, dept, adress, password_hash) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare SQL Statement

    $stmt = $mysqli->stmt_init();

    if( ! $stmt->prepare($sql)) {
        die("SQL Error: " . $mysqli->connect_error);
    } 

    $stmt->bind_param("ssssssss", 
                                    $random_id,
                                    $_POST["firstname"],
                                    $_POST["lastname"],
                                    $_POST["email"],
                                    $_POST["rank"],
                                    $_POST["dept"],
                                    $_POST["adress"],
                                    $password_hash
                    );

    if($stmt->execute()) {

        // Redirecting

        header("Location: signup_success.php");
        exit;
     } 
 if($mysqli->errno === 1062) {
        die("Email already Taken!");
    }
    else {
        die($mysqli->error . " " . $mysqli->errno);
    }

?>