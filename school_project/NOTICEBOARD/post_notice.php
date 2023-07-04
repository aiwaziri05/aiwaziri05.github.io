<?php

    $include = include_once __DIR__ . "/sidebar.php";

    if($_SERVER["REQUEST_METHOD"] === "POST") {
        $mysqli = require_once __DIR__ . "/db_connect.php";

        session_start();

        $sql = "SELECT * FROM admins";
      $user =  $result = mysqli_fetch_all($mysqli, $sql);
        $_SESSION["user_id"] = $user["id"];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/Style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
    <script src="/js/validation.js" defer></script>
    <title>Post Notice</title>
</head>
<body>
    <main class="main">
        <div class="main-section">
            <div class="container" id="container">
            <form action="notice_process.php" method="post">
            <h1>Post Notice</h1>
                <div>
                    <label for="title">Title:</label>
                    <input type="text" name="title" placeholder="add title">
                </div>
                <div>
                    <label for="file">Add File:</label>
                    <input type="file" name="file" id="file">
                </div>
                <div>
                    <label for="body">Discription:</label>
                    <textarea name="body" cols="width" rows="height" placeholder="Discription..."></textarea>
                </div>
                <input type="submit" value="Post">
            </form>
        </div>
        </div>
    </main>
</body>
</html>