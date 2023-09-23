<?php

require_once "Controller.php";

class Login extends Controller
{
  public function __construct()
  {
    $this->view("login");
  }

}
