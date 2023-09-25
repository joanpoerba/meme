<?php

require_once "Connection.php";

session_start();
$_SESSION["wrongStatus"] = [
  "wrong" => null,
  "wrongUsername" => null,
  "wrongPassword" => null,
  "wrongBoth" => null,
];

class LoginFunction extends Connection
{
  public function __construct(public string $userUsername, public string $userPassword)
  {
    $this->userUsername = htmlspecialchars(mysqli_real_escape_string($this->connection(), $userUsername));
    $this->userPassword = htmlspecialchars(mysqli_real_escape_string($this->connection(), $userPassword));

    $checkUsernameQuery = "SELECT * FROM user";
    $checkUsernameStatement = new mysqli_stmt($this->connection(), $checkUsernameQuery);

    if ($checkUsernameStatement->prepare($checkUsernameQuery)) {
      $checkUsernameStatement->execute();
      $result = $checkUsernameStatement->get_result();
      $result = $result->fetch_assoc();

      $hashedPassword = $result["password"];

      if ($result["username"] == $this->userUsername) {
        if (password_verify($this->userPassword, $hashedPassword)) {
          $_SESSION["wrongStatus"]["wrong"] = false;
        } else {
          $_SESSION["wrongStatus"]["wrong"] = true;
          $_SESSION["wrongStatus"]["wrongPassword"] = true;
        }
      } else {
        if (password_verify($this->userPassword, $hashedPassword)) {
          $_SESSION["wrongStatus"]["wrong"] = true;
          $_SESSION["wrongStatus"]["wrongUsername"] = true;
        } else {
          $_SESSION["wrongStatus"]["wrong"] = true;
          $_SESSION["wrongStatus"]["wrongBoth"] = true;
        }
      }
    }
  }
}

if (isset($_POST["signInButton"])) {
  $login = new LoginFunction($_POST["username"], $_POST["password"]);
}
