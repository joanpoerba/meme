<?php

class Controller
{
  public function view($fileName)
  {
    require_once "app/views/" . $fileName . ".php";
  }
}
