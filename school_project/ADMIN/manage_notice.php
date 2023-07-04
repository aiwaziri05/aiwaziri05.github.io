<?php

session_start();

if($_SESSION["post_id"]) {

}

  // Require sidebar

  $sidebar = require_once __DIR__ . "./sidebar.html";

    // Require database DIR

    $require = require_once "../CONFIG/db_connect.php";

    $sql = "SELECT * FROM posts";
    $result = mysqli_query($mysqli, $sql);
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <!-- ========= BootStrap 5 CDN Link ========= -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

    <!-- ========= BootStrap 5 Icon CDN LINK ========= -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">

    <!-- ========= BoxIcon CDN Link ========= -->

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- ========= Custom CSS Link ========= -->

    <link rel="stylesheet" href="sidebar.css">
  </head>
  <body>
    <section class="manage p-5 my-3 ms-5">
        <div class="container">
            <h2 class="title mb-5 text-center">
                Manage <span class="text-primary">Notice</span>
            </h2>
        </div>
        <div class="row w-100 ms-5">
            <div class="col md-4 d-flex justify-content-center">
            <table class="table table-striped w-75 ms-5">
    <thead class="bg-primary text-light">
      <tr>
        <th>id</th>
        <th>Title</th>
        <th>Notice Document</th>
        <th>Discription</th>
        <th>Date</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        <?php foreach($posts as $item) : ?>
      <tr>
        <td>
            <?php echo $item["id"] ?>
        </td>
        <td>
        <?php echo $item["title"] ?>
        </td>
        <td>
        <?php echo "no file added"; ?>
        </td>
        <td class="w-50">
        <?php echo $item["body"] ?>
        </td>
        <td>
        <?php echo $item["post_date"] ?>
        </td>
        <td class="px-4">
            <div class="btns d-flex me-3">
                <button type="submit"
                class="btn btn-success btn-sm me-3"
                name="edit">
                    edit
                </button>
                <button type="submit"
                class="btn btn-outline-danger btn-sm"
                name="delete">
                    Delete
                </button>
            </div>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
            </div>
        </div>
    </section>
  </body>
</html>