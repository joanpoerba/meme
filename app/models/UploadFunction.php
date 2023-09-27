<?php

require_once "init.php";

class UploadFunction extends Connection
{
  public function __construct(public mixed $image, public string $description)
  {
    $insertQuery = "INSERT INTO post(userId, image, postDescription) VALUE(?, ?, ?)";
    $insertStatement = new mysqli_stmt($this->connection(), $insertQuery);

    if ($insertStatement->prepare($insertQuery)) {
      $validType = ["png", "jpg", "jpeg", "webp", "avif"];
      $imageType = explode("image/", $this->image["type"]);
      $imageType = $imageType[1];

      if (in_array($imageType, $validType)) {
        $imageNewName = uniqid("", true);
        $imageNewName = $imageNewName . "." . $imageType;
        move_uploaded_file($this->image["tmp_name"], "public/img/post/" . $imageNewName);

        $insertStatement->bind_param("iss", $_SESSION["data"]["userId"], $imageNewName, $this->description);
        $insertStatement->execute();

        header("Refresh:0");
      } else {
        return false;
      }
    }
  }
}
