<?php
session_start();
    // Notice Validation

    if(empty($_POST["title"])) {
        die("Title is required");
    }
    if(empty($_POST["body"])) {
        die("Please add a Discription");
    }

    // Require database DIR

    $require = require_once __DIR__ . "/db_connect.php";

    // Prepare SQL
    $sql = "INSERT INTO posts (title, file, body) 
            VALUES (?, ?, ?)";
    // $result = mysqli_query($mysqli, $sql);

    $stmt = $mysqli->stmt_init();
    // Handle SQL error

    if(! $stmt->Prepare($sql)) {
    die("SQL error: " . $mysqli->error);
   }

    $stmt->bind_param("sss", 
                            // $_POST["user_id"],
                            $_POST["title"],
                            $_POST["file"],
                            $_POST["body"],
                    );
    if($stmt->execute()) {
        header("Location: manage_notice.php");
        exit;
    }
    if($mysqli->errno === 1062) {
        die("Title already exist!");
    }
    else {
        die($mysqli->error . " " . $mysqli->errno);
    }

    
    

?>