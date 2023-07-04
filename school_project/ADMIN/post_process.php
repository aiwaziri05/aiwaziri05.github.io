<?php

    // Post Process

    if(empty($_POST["username"])) {
        die("Username is Required");
    }

    if(empty($_POST["title"])) {
        die("Title is Required");
    }

    if(empty($_POST["body"])) {
        die("Add a discription Please");
    }

    // Add Post

    if(htmlspecialchars($_SERVER["REQUEST_METHOD"] === "POST")) {

        // Require database DIR 

        $require = require_once "../CONFIG/db_connect.php";

        // Insert Post

        $sql = "INSERT INTO posts (user_name, title, file, body)
                VALUES (?, ?, ?, ?)";

        $stmt = $mysqli->stmt_init();
        
        // Prepare SQL 

        if( ! $stmt->prepare($sql)) {
            die("SQL Error: " . $mysqli->error);
        }

        $stmt->bind_param("ssss", 
                                    $_POST["username"],
                                    $_POST["title"],
                                    $_POST["file"],
                                    $_POST["body"],
                        );
       if($stmt->execute()) {
        
        // Redirect to manage notice
        session_start();
       $user = $_SESSION["post_id"] = $_POST["username"];
        header("Location: manage_notice.php");
        exit;

       }
       if($mysqli->errno === 1062) {
        die("Title already Taken!");
       }
       else {
        die($mysqli->errno . " " . $mysqli->error);
       }
    }





    print_r($_POST);




