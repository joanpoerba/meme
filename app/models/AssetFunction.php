<?php

require_once "init.php";

class AssetFunction{
  public static function asset(string $target){
    echo "public/" . $target;
  }
}