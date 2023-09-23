<?php

require_once "Controller.php";

class Register extends Controller
{
  public function __construct()
  {
    $this->view("register");
  }
}
