<?php
require_once "app/models/RegisterFunction.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Meme</title>
  <link rel="stylesheet" href="http://localhost/meme/public/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body style="height: 100vh;" class="container-fluid row d-flex justify-content-center align-items-center m-0 p-0">
  <div class="col-11 col-sm-8 col-md-5 col-lg-5 col-xl-3 bg-light rounded-2 shadow-sm p-4">
    <h1 class="text-warning fw-bold m-0">Meme</h1>
    <p class="m-0">Welcome</p>
    <?php if ($_SESSION["data"]["sameUsername"] == true) : ?>
      <div class="p-0 bg-danger rounded-3 border border-3 border-danger-subtle d-flex flex-row justify-content-center align-items-center py-2 mt-3">
        <i class="bi bi-exclamation-circle-fill text-light fs-5"></i>
        <p class="m-0 ms-2 text-light">Sorry, this username has been used</p>
      </div>
    <?php endif; ?>
    <form class="mt-2" action="" method="post">
      <input style="outline: none;" class="col-12 border-1 border-secondary px-3 py-1 rounded-1" type="text" placeholder="Username" name="username" autocomplete="off" maxlength="12" autofocus>
      <div class="col-12 mt-4 d-flex justify-content-between px-3 py-1 border border-1 border-secondary rounded-1">
        <input style="outline: none;" class="border-0 bg-transparent" type="password" placeholder="Password" name="password" autocomplete="off">
        <i style="cursor: pointer;" class="bi bi-eye-slash-fill fs-5"></i>
      </div>
      <button class="col-12 btn btn-warning py-1 rounded-1 fw-semibold text-light mt-4" name="signUpButton">Sign up</button>
      <p class="m-0 mt-2">Have any account? <a href="login" class="text-primary">Sign in</a></p>
    </form>
  </div>
</body>

</html>