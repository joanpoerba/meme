<?php

require_once "init.php";

class EditPostFunction extends Connection
{
  public function __construct(public string $postDescription, public $id)
  {
    $deleteQuery = "UPDATE post SET postDescription = ? WHERE id = ?";
    $deleteStatement = new mysqli_stmt($this->connection(), $deleteQuery);

    if ($deleteStatement->prepare($deleteQuery)) {
      $deleteStatement->bind_param("si", $this->postDescription, $this->id);
      $deleteStatement->execute();

      if ($deleteStatement->affected_rows > 0) {
        $this->redirect("/");
        return true;
      }
    }
  }
}
