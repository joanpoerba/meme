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
    <p class="m-0">Welcome back</p>
    <form class="mt-3" action="" method="post">
      <input style="outline: none;" class="col-12 border-1 border-secondary px-3 py-1 rounded-1" type="text" placeholder="Username">
      <div class="col-12 mt-4 d-flex justify-content-between px-3 py-1 border border-1 border-secondary rounded-1">
        <input style="outline: none;" class="border-0 bg-transparent" type="password" placeholder="Password">
        <i style="cursor: pointer;" class="bi bi-eye-slash-fill fs-5"></i>
      </div>
      <div class="mt-3 p-0 d-flex align-items-center">
        <input style="width: 15px; height: 15px;" type="checkbox" id="rememberMe">
        <label class="ms-2" for="rememberMe">Remember me</label>
      </div>
      <button class="col-12 btn btn-warning py-1 rounded-1 fw-semibold text-light mt-2">Sign in</button>
      <p class="m-0 mt-2">Don't have any account? <a href="register" class="text-primary">Sign up</a></p>
    </form>
  </div>
  <script src="http://localhost/meme/public/js/jquery.js"></script>
  <script>
    $(window).ready(function() {
      $("button").on("click", function() {
        alert("hello")
      })
    })
  </script>
</body>

</html>