<?php
    
    $require = require_once __DIR__ . "/db_connect.php";

    $sql = "SELECT * FROM posts";
    $result = mysqli_query($mysqli, $sql);
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    if(isset($_POST["delete"])) {
        $sql = sprintf("DELETE FROM posts WHERE id='%s'", $mysqli->real_escape_string($_POST['id']));
        $result = $mysqli->query($sql);
        
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
    <title>Manage Notice</title>
</head>
<body>

    <main class="main">
        <div class="container">
            <h1>Manage Notices</h1>
        </div>
        <div class="btn-group">
            <a href="post_notice.php" type="button">
                <span>+</span>
                Add
            </a><a href="dashboard.php" type="button" id="back">
                <span><-</span>
                GoBack
            </a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Notice File</th>
                    <th>Notice Discription</th>
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
                        <?php echo $item["file"] ?>
                    </td>
                    <td>
                        <?php echo $item["body"] ?>
                    </td>
                    <td>
                    <?php echo $item["post_date"] ?>
                    </td>
                    <td>
                        <div class="btns">
                            <input style="background: #2e8b57;" type="submit" name="edit" value="Edit">
                            <input style="background: #dc143c;" type="submit" value="Delete" name="delete">
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
    <form action="" method="post">
        <input type="hidden" name="delete">
    </form>
</body>
</html>