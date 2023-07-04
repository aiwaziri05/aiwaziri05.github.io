<?php 

  // Require header DIR
  
  // $require = require_once __DIR__ . "/header.html";

  
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SignUp</title>

    <!-- ========= BootStrap 5 CDN Link ========= -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

    <!-- ========= BootStrap 5 Icon CDN LINK ========= -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">

    <!-- ========= Just Validate CDN Link ========= -->

<script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>

<script src="../JS/validation.js" defer></script>
    <!-- ========= Custom CSS Link ========= -->

    <link rel="stylesheet" href="../CSS/style.css">

  </head>
  <body>

  <section class="p-5 mt-3  align-items-center justify-content-center">
  <div class="form-title p-2 mb-4 text-center">
        <h1 class="p-2">Admin 
          <span class="text-primary">
          SignUp
          </span>
        </h1>
      </div>
    <div class="container d-flex align-items-center justify-content-center">

      <!-- ========= SignUp Form ========= -->

      <form class="w-50" action="process_signup.php" method="post" id="signup" novalidate>
  <div class="row my-3">
    <div class="col">
      <label for="firstname" class="form-label">FirstName:</label>
      <input type="text" class="form-control" placeholder="Enter firstname" id="first_name" name="firstname">
    </div>
    <div class="col">
      <label for="lastname" class="form-label">LastName:</label>
      <input type="text" class="form-control" placeholder="Enter lastname" id="last_name" name="lastname" >
    </div>
  </div>
  <div class="row my-3">
    <div class="col">
      <label for="email" class="form-label">Email:</label>
      <input type="text" class="form-control" placeholder="Enter email" id="email" name="email">
    </div>
    <div class="col">
      <label for="rank" class="form-label">Rank:</label>
    <select class="form-select " aria-label="Default select example" id="select_rank" name="rank">
    <option selected>Select </option>
    <option value="HOD">HOD</option>
    <option value="Examination Officer">Examination Officer</option>
    <option value="Level Coordinator">Level Coordinator</option>
    <option value="Others">Others</option>
    </select>
    </div>
    </div>
    <div class="row my-3">
    <div class="col">
    <label for="rank" class="form-label">Department:</label>
    <select class="form-select " aria-label="Default select example" name="dept">
    <option selected>Select</option>
    <option value="Computer Science">Computer Science</option>
    <option value="Mathematics">Mathematics</option>
    <option value="Physics">Physics</option>
    <option value="Chemistry">Chemistey</option>
    <option value="others">Others</option>
</select>
    </div>
    <div class="col">
    <label for="adress" class="form-label">Adress:</label>
      <input type="text" class="form-control" placeholder="Enter adress" name="adress">
    </div>
    </div>
    <div class="row my-3">
      <div class="col">
        <label for="password" class="form-lab">Password</label>
        <input type="password" class="form-control" placeholder="Enter password" name="password">
      </div>
      <div class="col">
        <label for="passwordConfirm" class="form-lab">Retype Password</label>
        <input type="password" class="form-control" placeholder="Retype password" name="passwordConfirm">
      </div>
    </div>
    <div class="row my-3">
      <div class="col">
        <button type="submit"
         class="btn btn-primary btn-md w-25"
         name="submit">
         SignUp
        </button>
      </div>
    </div>
    <div class="row text-center">
      <div class="col">
        <p>Already have an Account? 
          <a href="../index.php" class="d-inline-block nav-link text-primary fw-medium">Login</a>
        </p>
      </div>
    </div>
  </div>

</form>


  </body>
</html>
    