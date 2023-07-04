<?php

session_start();

    if(isset($_SESSION["user_id"])) {
       $require =  require_once __DIR__ . "/db_connect.php";

       $sql = "SELECT * FROM admins WHERE id = {$_SESSION["user_id"]}";
       $result = $mysqli->query($sql);
       $user = $result->fetch_assoc();

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
    <title>Dashboard</title>
</head>
<body>
    <nav class="dashboard">
        <div class="sidebar">
            <div class="sidebar-top">
                <div class="col">
                    <span>CL</span>
                </div>
                <div class="profile">
                    <img src="./IMAGES/add-user.png">
                </div>
            </div>
            <div class="head">
                <h3>Admin Dashboard</h3>
            </div>
            <div class="sidebar-nav">
                <ul class="nav">
                    <li class="nav-list">
                        <a href="dashboard.php" class="nav-link active">Dashboard</a>
                        <span></span>
                    </li>
                    <li class="nav-list">
                        <a href="#" class="nav-link">Profile</a>
                        <span></span>
                    </li>
                    <li class="nav-list">
                        <a href="post_notice.php" class="nav-link">Post Notice</a>
                        <span></span>
                    </li>
                    <li class="nav-list">
                        <a href="manage_notice.php" class="nav-link">Manage Notice</a>
                        <span></span>
                    </li>
                    <li class="nav-list">
                        <a href="#" class="nav-link">Settings</a>
                        <span></span>
                    </li>
                    <li class="nav-list logout">
                        <a href="login.php" class="nav-link">Logout</a>
                        <span></span>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="main">
        <div class="container">
            <?php if(isset($user)) :?>
            <div class="main-top">
                <h2>Welcome: <?= $user["user_name"]; ?></h2>
                <h3>Sataus: <?= $user["rank_name"]; ?></h3>
                <h3>User ID: <?= $user["user_id"]; ?></h3>
            </div>
            <?php endif; ?>
            <div class="main-section">
                <div class="container">
                    <div class="cards">
                        <div class="card">
                            <div class="card-header">
                                <h3>Manage Account</h3>
                            </div>
                            <div class="card-body">
                                <img src="./IMAGES/user-avatar.png">
                            </div>
                            <div class="card-footer">
                                <a href="profile.php">Edit or Update Admin Account</a>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h3>Modify Notice</h3>
                            </div>
                            <div class="card-body">
                                <img src="./IMAGES/add-file.png">
                            </div>
                            <div class="card-footer">
                                <a href="post_notice.php">Add Delete or Update Notice</a>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h3>View Notice</h3>
                            </div>
                            <div class="card-body">
                                <img src="./IMAGES/views.png">
                            </div>
                            <div class="card-footer">
                                <a href="view_notice.php">View Notice Posted</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>