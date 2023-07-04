<?php

session_start();

    // Require sidebar DIR

    $sidebar = require_once __DIR__ . "/sidebar.html";

    // Require database DIR

    $require = require_once "../CONFIG/db_connect.php";


    if(isset($_SESSION["notice_id"])) {

        // Fetch user data

        $sql = "SELECT * FROM admins WHERE id='{$_SESSION["notice_id"]}'";
        $result = $mysqli->query($sql);
       $user = $result->fetch_assoc();
    }

    // Fetch Posts

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
    <title>Dashboard</title>
</head>
<body>

    <section class="section p-3 mt-3" id="main" >
        <div class="container">
            <?php if(empty($posts)) : ?>
            <h4 class="text-center">Empty <span class="text-primary"
             >Posts</span>
             <?php else : ?>
             <h4 class="text-center mt-3">Recent 
                <span class="text-primary">Posts</span></h4>
            </h4>
            <?php endif; ?>
        <div class="row my-4">
            <div class="col md-3">
                <?php foreach($posts as $item) : ?>
                <div class="card w-100 d-block bg-light my-4">
                    <h5 class="card-title text-center p-2">
                        <?php echo strtoupper($item["title"]); ?>
                    </h5>
                    <div class="card-body">
                    <p>
                        <?php echo $item["body"]; ?>
                    </p>
                </div>
                <div class="card-footer text-center fw-medium">
                    By <?php echo $item["user_name"]; ?> On 
                    <?php echo $item["post_date"]; ?>
                </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    </section>
</body>
</html>