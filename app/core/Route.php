<?php

class Route
{
  public static array $routes;

  public static function add(mixed $path, mixed $controller, mixed $method)
  {
    self::$routes[] = [
      "path" => $path,
      "controller" => $controller,
      "method" => $method
    ];
  }

  public static function run()
  {
    $path = "/";

    try {
      if (isset($_SERVER["PATH_INFO"])) {
        $path = $_SERVER["PATH_INFO"];
      }

      foreach (self::$routes as $routes) {
        if($path == $routes["path"]){
          if(file_exists("app/controllers/" . $routes["controller"] . ".php")){
            require_once "app/controllers/" . $routes["controller"] . ".php";
            $controller = new $routes["controller"];
          }
        }
      }
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }
}
