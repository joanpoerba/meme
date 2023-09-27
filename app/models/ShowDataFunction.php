<?php

require_once "init.php";

class ShowData extends Connection
{
  public function data()
  {
    $showQuery = "SELECT user.id, user.username, user.photoProfil, post.userId, post.image, post.postDescription, post.dateTime FROM user INNER JOIN post WHERE user.id = post.userId ORDER BY post.dateTime DESC";
    $showStatement = new mysqli_stmt($this->connection(), $showQuery);

    if ($showStatement->prepare($showQuery)) {
      $showStatement->execute();
      $result = $showStatement->get_result();
      return $result;
    }
  }
}
