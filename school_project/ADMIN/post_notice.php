<?php 

    // Require header DIR


    session_start();

    if(isset($_SESSION["user_id"])) {

        // Require database DIR

        $require = require_once "../CONFIG/db_connect.php";
        // Fetch user data

        $sql = "SELECT * FROM admins WHERE id='{$_SESSION["user_id"]}'";
        $result = $mysqli->query($sql);
       $user = $result->fetch_assoc();

    }
    $sidebar = require_once __DIR__ . "/sidebar.html";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Notice</title>
</head>
<body>
    
<section class="section p-3 " id="main">
        
        <div class="main-body w-50 d-flex align-items-center m-auto mt-5">
            <div class="container bg-light mt-5 p-4 rounded ">
                <div class="col mb-3">
                    <h3 class="text-center">Post <span class="text-primary">Notice</span></h3>
                </div>
                <div class="form-box d-flex justify-content-center">
                <form action="post_process.php" method="post" enctype="multipart/form-data">
                <div class="row my-3">
                    <div class="col">
                    <label for="username" class="form-label">Username:</label>
                    <input type="text" class="form-control" placeholder="Enter username" name="username">
                    </div>
                    <div class="col">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" class="form-control" placeholder="Enter title" name="title">
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col">
                        <label for="file" class="form-label">
                            Add File:
                        </label>
                    <div class="input-group mb-3">
                    <input type="file" class="form-control" id="inputGroupFile02" name="upload">
                    <label class="input-group-text bg-primary text-light" for="inputGroupFile02">Upload</label>
                    </div>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col">
                        <label for="body" class="form-label">
                            Discription:
                        </label>
                    <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingtext" name="body"></textarea>
                    <label for="floatingTextarea2">Add discription here...</label>
                    </div>
                    </div>
                </div>
                <button class="btn btn-primary w-25">
                    Post
                </button>
                </form>
                </div>
            </div>
        </div>
        
        </div>
    </section>

</body>
</html>