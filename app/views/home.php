<?php
require_once "app/models/init.php";
require_once "app/models/ShowDataFunction.php";
require_once "app/models/ShowUserPostFunction.php";

$datas = new ShowData;
$datas = $datas->data();

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
  <?php require_once "public/components/upload.php" ?>
  <?php require_once "public/components/body.php" ?>

  <script src="<?php AssetFunction::asset("js/bootstrap.js"); ?>"></script>
</body>

</html>