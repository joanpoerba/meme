<?php

require_once "init.php";

class ShowUserPost extends Connection
{
  public function data($id)
  {
    $showQuery = "SELECT post.id, post.userId, post.image, post.postDescription, post.dateTime FROM post WHERE post.userId = ? ORDER BY post.dateTime DESC";
    $showStatement = new mysqli_stmt($this->connection(), $showQuery);

    if ($showStatement->prepare($showQuery)) {
      $showStatement->bind_param("s", $id);
      $showStatement->execute();
      $result = $showStatement->get_result();
      return $result;
    }
  }

  public function userData($id)
  {
    $showQuery = "SELECT user.id, user.username, user.photoProfil, user.pronunciation FROM user WHERE user.id = ?";
    $showStatement = new mysqli_stmt($this->connection(), $showQuery);

    if ($showStatement->prepare($showQuery)) {
      $showStatement->bind_param("s", $id);
      $showStatement->execute();
      $result = $showStatement->get_result();
      return $result;
    }
  }

  public function detailPostData($id)
  {
    $showQuery = "SELECT post.id, post.userId, post.image, post.postDescription, post.dateTime FROM post WHERE post.id = ? ORDER BY post.dateTime DESC";
    $showStatement = new mysqli_stmt($this->connection(), $showQuery);

    if ($showStatement->prepare($showQuery)) {
      $showStatement->bind_param("s", $id);
      $showStatement->execute();
      $result = $showStatement->get_result();
      return $result;
    }
  }
}
