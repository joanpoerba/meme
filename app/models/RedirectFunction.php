<?php

class RedirectFunction
{
  public function redirect(string $page, mixed $data = null)
  {
    header("location: http://localhost/meme" . $page);
    return $data;
  }
}
