<?php
require_once "app/models/init.php";
require_once "app/models/ShowDataFunction.php";
require_once "app/models/ShowUserPostFunction.php";

$datas = new ShowData;
$datas = $datas->data();

$userDatas = new ShowUserPost;
$userPosts = $userDatas->data($_SESSION["data"]["userId"]);
$userData = $userDatas->userData($_SESSION["data"]["userId"]);

$Access = new HomeAccessRequirementsFunction;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="http://localhost/meme/public/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body class="m-0 p-0">
  <?php require_once "public/components/header.php" ?>
  <?php require_once "public/components/userProfilBody.php" ?>
  <?php require_once "public/components/upload.php" ?>
  <script src="<?php AssetFunction::asset("js/bootstrap.js"); ?>"></script>
</body>

</html>