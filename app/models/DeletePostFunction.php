<?php

require_once "init.php";

class DeletePostFunction extends Connection
{
  public function __construct(public $id)
  {
    $deleteQuery = "DELETE FROM post WHERE id = ?";
    $deleteStatement = new mysqli_stmt($this->connection(), $deleteQuery);

    if ($deleteStatement->prepare($deleteQuery)) {
      $deleteStatement->bind_param("i", $this->id);
      $deleteStatement->execute();

      if ($deleteStatement->affected_rows > 0) {
        $this->redirect("/");
        return true;
      }
    }
  }
}
