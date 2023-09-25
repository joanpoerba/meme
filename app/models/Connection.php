<?php

require_once "init.php";

class Connection extends RedirectFunction
{
  public $connection;
  public function connection(): mixed
  {
    try {
      $this->connection = new mysqli("localhost", "root", "", "meme");

      return $this->connection;
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }
}
