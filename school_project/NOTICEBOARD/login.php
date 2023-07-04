<?php

    $is_invalid = false;
    if(htmlspecialchars($_SERVER["REQUEST_METHOD"] === "POST")) {
        $require = require_once __DIR__ . "/db_connect.php";

        $sql = sprintf("SELECT * FROM admins WHERE email='%s'", $mysqli->real_escape_string($_POST['email']));

        $result = $mysqli->query($sql);
        $user = $result->fetch_assoc();

        if(password_verify($_POST['password'], $user['password_hash'])) {
            session_start();
            session_regenerate_id();
           $user = $_SESSION["user_id"] = $user["id"];
            header("Location: dashboard.php");
            exit;
        }
        $is_invalid = true;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <title>Login</title>
</head>
<body>
<body>
    <form method="post" novalidate>
        <h1>Login</h1>
        <?php if($is_invalid) : ?>
            <em style="color: red;">Invalid Login</em>
            <?php endif; ?>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php htmlspecialchars($_POST['email'] ?? "") ?>">
        </div><div>
            <label for="password">Password:</label>
            <input type="password" name="password">
        </div>
        <input type="submit" value="Login">
    </form>
</body>
</html>