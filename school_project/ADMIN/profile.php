<?php
  
//   Requiring the Sidebar DIR

  $require = require_once __DIR__ . "./sidebar.html";

//   Requiring the database DIR

  $require = require_once "../CONFIG/db_connect.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>

    <!-- Main Section Start -->
    
    <section id="main" class="p-3 mt-1">
        <!-- Main top Start -->

        <div class="container">
                <?php if(isset($user)) :?>
            <div class="main-top p-3 my-2">
                <h4>Welcome: <?= $user["first_name"], " " .$user["last_name"]; ?></h4>
                <h5>Sataus: <?= $user["rank"]; ?></h5>
                <p class="fw-medium">User ID: <?= $user["user_id"]; ?></p>
            </div>
            <?php endif; ?>
            <div class="col" id="col">
                <div class="col" id="col">
                    <li class="mt-1 me-3 text-secondary">
                    <i class="fa-solid fa-user-gear"></i>
                    </li>
                </div>
            </div>
        </div>

        <!-- Main top End -->

    </section>
    
    <!-- Main Section End -->
    
</body>
</html>