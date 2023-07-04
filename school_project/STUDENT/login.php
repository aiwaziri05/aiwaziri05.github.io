<?php

    // Require Header DIR

    $require = require_once "../header.html";

    $is_invalid = false;

    // Server Request

    if(htmlspecialchars($_SERVER["REQUEST_METHOD"] === "POST")) {

        // Require database DIR

        $require = require_once "../CONFIG/db_connect.php";

        // Fetch user data

        $sql = sprintf("SELECT * FROM admins WHERE email='%s'", $mysqli->real_escape_string($_POST['email']));

        $result = $mysqli->query($sql);
        $user = $result->fetch_assoc();

        // Verify Password

        if(password_verify($_POST['password'], $user['password_hash'])) {

            // Create Session Variable

            session_start();
            session_regenerate_id();
            $_SESSION["user_id"] = $user["id"];

            // Redirect to dashboard

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
    <link rel="stylesheet" href="../CSS/style.css">
    <title>Student Login</title>
</head>
<body>
<section class="p-5 mt-5  align-items-center justify-content-center">
  <div class="form-header p-2 mb-4 text-center">
        <h1 class="p-2">Student
          <span class="text-primary">
          Login
          </span>
        </h1>
        <div class="log d-flex align-items-center justify-content-center p-2">
          <div>
          <a href="../index.php" role="button" class="btn btn-outline-primary btn-sm mx-3">Admin</a>

          <a href="" role="button" class="btn btn-primary btn-sm mx-3">Student</a>
          </div>
        </div>
      </div>
    <div class="container d-flex align-items-center justify-content-center">

      <!-- ========= Login Form ========= -->
      
      <form class="w-50" method="post" novalidate>
         <?php if($is_invalid) : ?>
            <em class="text-danger">Invalid Login</em>
         <?php endif; ?>
     <div class="mb-3">
    <label for="email" class="form-label">Email address:</label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" value="<?php htmlspecialchars($_POST['email'] ?? "") ?>">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password:</label>
    <input type="password" class="form-control" id="passsword" name="password">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input"
     id="rememberMe"
     checked>
    <label class="form-check-label" for="exampleCheck1">Rememeber Me</label>
  </div>
  <button type="submit" class="btn btn-primary btn-md fw-medium w-25">Login</button>
</form>
    
    </div>
    <div class="my-4">
        <p class="fw-medium text-center">
            Already have an Account?
             <a href="signup.php" class="nav-link d-inline-block text-primary">
                SignUp
            </a>
        </p>
    </div>
</body>
</html>