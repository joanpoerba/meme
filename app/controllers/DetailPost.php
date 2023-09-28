<?php

require_once "Controller.php";

class DetailPost extends Controller{
  public function __construct()
  {
    $this->view("detailPost");
  }
}