<?php

require_once "Controller.php";

class Home extends Controller{
  public function __construct()
  {
    $this->view("home");
  }
}