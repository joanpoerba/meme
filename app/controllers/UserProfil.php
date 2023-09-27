<?php

require_once "Controller.php";

class UserProfil extends Controller{
  public function __construct()
  {
    $this->view("userProfil");
  }
}