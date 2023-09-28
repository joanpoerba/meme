<?php
require_once "app/models/init.php";
require_once "app/models/ShowDataFunction.php";
require_once "app/models/ShowUserPostFunction.php";

$datas = new ShowData;
$datas = $datas->data();

$userDatas = new ShowUserPost;
$userPosts = $userDatas->data($_SESSION["data"]["userId"]);
$userData = $userDatas->userData($_SESSION["data"]["userId"]);
$detailPosts = $userDatas->detailPostData($_GET["id"]);

if (isset($_POST["deleteBtn"])) {
  $deletePost = new DeletePostFunction($_GET["id"]);
}

if (isset($_POST["ubahBtn"])) {
  $deletePost = new EditPostFunction($_POST["newDescription"], $_GET["id"]);
}

$Access = new HomeAccessRequirementsFunction;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="http://localhost/meme/public/css/bootstrap.css">
</head>

<body class="m-0 p-0">
  <?php require_once "public/components/header.php" ?>
  <?php require_once "public/components/detailPostBody.php" ?>
  <?php require_once "public/components/upload.php" ?>
</body>

</html>