<?php

    // Requiring database DIR

    $require = require_once __DIR__ . "/db_connect.php";

    // From Validation

    if(empty($_POST["username"])) {
        die("Username is Required");
    }
    if(! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        die("Email is Required");
    }
    if(strlen($_POST["password"]) < 8) {
        die("Password must be at least 8 characters");
    }
    if(! preg_match("/[a-z]/i", $_POST["password"])) {
        die("Password must contain at least one letter");
    }if(! preg_match("/[0-9]/i", $_POST["password"])) {
        die("Password must contain at least one number");
    }
    if($_POST["password_confirm"] !== $_POST["password"]) {
        die("Password must match");
    }
    $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // Preparing SQL 
    $user_id = user_id(8);
    $sql = "INSERT INTO admins (user_name,user_id,email,rank_name,dept,password_hash)
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $mysqli->stmt_init();
    if(! $stmt->prepare($sql)) {
        die("SQL error: ". $mysqli->error);
    }

    $stmt->bind_param("ssssss",
                            $_POST["username"],
                            $user_id,
                            $_POST["email"],
                            $_POST["rank"],
                            $_POST["dept"],
                            $password_hash,  
                    );
    if($stmt->execute()) {
        header("Location: signup_success.php");
        exit;
    }
    // Handle SQL error

    if($mysqli->errno === 1062) {
        die("Email already Taken!");
    }
    else {
        die($mysqli->error . " " . $mysqli->errno);
    }

    function user_id($length) {
        $text = "";
        $len = rand(8, $length);

        for($i = 1; $i < $len; $i++) {
            $text .= rand(0,9);
        }
        return $text;
    }
?>