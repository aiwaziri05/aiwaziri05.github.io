<?php
session_start();
    
if(isset($_SESSION["user_id"])) {
    $require =  require_once __DIR__ . "/db_connect.php";

    $sql = "SELECT * FROM admins WHERE id = {$_SESSION["user_id"]}";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();

 }
 $sql = "SELECT * FROM posts";
 $result = mysqli_query($mysqli, $sql);
 $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
    <script src="/js/validation.js" defer></script>
    <title>View Notice</title>
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <div class="logo">
                <img src="./IMAGES/sticky-note (2).png">
            <a href="#" class="brand">
                Online NoticeBoard
            </a>
            </div>
            <ul class="navbar-nav">
                <li class="nav-list">
                    <a href="#home" class="nav-link">
                        <span>Home</span>
                    </a>
                </li>
                <li class="nav-list">
                    <a href="#home" class="nav-link">
                        <span>About</span>
                    </a>
                </li>
                <li class="nav-list">
                    <a href="#home" class="nav-link">
                        <span>Notice</span>
                    </a>
                </li>
                <li class="nav-list">
                    <a href="#home" class="nav-link">
                        <span>Contact</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <main class="main">
        <div id="main-section">
            <div class="container">
                <div>
                    <?php if(empty($posts)) :?>
                        <h2>Empty Notice:</h2>
                        <?php else : ?>
                        <h2>Recent Posts:</h2>
                    <?php endif; ?>
                </div>
                <div class="cards" id="card">
                    <?php foreach($posts as $item) : ?>
                    <div class="card" id="card-post">
                        <div class="card-header">
                        <h3><?php echo $item["title"] ?> </h3>
                        </div>
                        <div class="card-body">
                            <p>
                                <?php echo $item["body"] ?>
                            </p>
                        </div>
                        <div class="card-footer">
                            <?php if(isset($user)) : ?>
                            <p>
                                By
                                <?php echo $user["user_name"] ?>
                                On <?php echo $item["post_date"] ?>
                            </p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </main>
</body>
</html>