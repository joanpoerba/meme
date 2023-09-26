<?php

require_once "init.php";

class HomeAccessRequirementsFunction extends RedirectFunction{
  public function __construct(){
    if(!isset($_SESSION["data"])){
      $this->redirect("/login");
    } elseif($_SESSION["data"]["loginStatus"] != true) {
      $this->redirect("/login");
    }
  }
}