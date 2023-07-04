<?php

session_start();

    // Require header DIR

    if(isset($_SESSION["user_id"])) {

        // Require database DIR

        $require = require_once "../CONFIG/db_connect.php";

        // Fetch user data

        $sql = "SELECT * FROM admins WHERE id='{$_SESSION["user_id"]}'";
        $result = $mysqli->query($sql);
       $user = $result->fetch_assoc();

         // Fetch Data

    $sql = "SELECT * FROM posts";
    $result = mysqli_query($mysqli, $sql);
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

    }
    
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
    <?php 
        $sidebar = require_once __DIR__ . "/sidebar.html";
    ?>

    <!-- Main Section -->

    <section class="section p-3 mt-1" id="main">

    <!-- Main top Start -->

        <div class="container">
         <!-- Main-top Start -->

         <div class="container bg-light p-2 rounded my-5">
            <div class="row w-100 d-flex align-items-center justify-content-between">
                <div class="col col-md px-4">
                    <span>
                        Important Notice
                        <span class="badge bg-danger ">View</span>
                        <br>
                        <span class="text-secondary">All Important Notice here</span>
                    </span>
                </div>
                <div class="col col-md text-center ms-5">
                   <a href="view_notice.php"
                   role="button"
                   class="btn btn-outline-primary btn-sm">
                   Show all
                   </a>
                </div>
            </div>
         </div>

         <!-- Main-top End -->
            <div class="row d-flex my-3 w-75 align-items-center">
                <div class="col">
                     <select class="form-select w-25" aria-label="Default select example" id="">
                    <option selected>Filter </option>
                    <option value="">Proiority</option>
                    <option value="Examination Officer">Trash</option>
             </select>
                </div>
                <div class="col">
                    <span class="search" id="search">
                    <i class='bx bx-search h3 px-2 py-1 text-secondary'></i>
                    </span>
                    <input type="search" class="form-control ps-5"
                    placeholder="Search notice">
                </div>
            </div>
        </div>

         <!-- Main top end -->

         <section id="notices">
            <span class="mb-2 p-2">All Notices</span>
            <div class="container w-100 bg-light rounded p-3 my-2">
                <?php foreach($posts as $item): ?>
                <div class="col-md">
                  <div class="card bg-light d-inline-block px-4 mb-1 w-100 py-1" id="card-1">
                    <input type="checkbox">
                    <span class="p-2">
                        <?php echo $item["id"]; ?>
                    </span>
                    <span class="title p-2">
                    <?php echo $item["title"]; ?>
                    </span>

                    <span class="body p-2" style="display:inline-flex; max-width: 680px; height:35px; overflow:hidden;">
                    <?php echo $item["body"]; ?>
                    </span>

                    <span class="date p-2">
                        <?php echo $item["post_date"]; ?>
                    </span>
                    <span>
                        <a href="view_notice.php"
                        class="btn btn-outline-primary btn-sm" 
                        role="button">View</a>
                    </span>
                </div>
                </div>
                <?php endforeach; ?>
         </section>
        
         <!-- Pagination Start -->

         <div id"">
            <nav aria-label="...">
            <ul class="pagination d-flex justify-content-center">
                <li class="page-item disabled">
                <a class="page-link">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active" aria-current="page">
                <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
         </div>
         <!-- Pagination End -->

</body>
</html>