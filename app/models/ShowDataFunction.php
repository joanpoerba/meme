<?php

require_once "init.php";

class ShowData extends Connection
{
  public function __construct()
  {
    $showQuery = "SELECT * FROM user";
    $showStatement = new mysqli_stmt($this->connection(), $showQuery);

    if ($showStatement->prepare($showQuery)) {
      $showStatement->execute();
      $result = $showStatement->get_result();

      foreach ($result as $datas) {
        $datas = json_encode($datas);

        print_r($datas);
      }
    }
  }
}

$data = new ShowData;
