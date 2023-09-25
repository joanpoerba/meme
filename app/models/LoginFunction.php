<?php

require_once "init.php";

session_start();
$_SESSION["wrongStatus"] = [
  "wrong" => null,
  "wrongUsername" => null,
  "wrongPassword" => null,
  "wrongBoth" => null,
];

$_SESSION["data"] = [
  "sameUsername" => null,
  "userUsername" => null,
  "userPassword" => null,
  "loginStatus" => null
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

          $this->redirect("/", $_SESSION["data"] = [
            "sameUsername" => null,
            "userUsername" => $this->userUsername,
            "userPassword" => $this->userPassword,
            "loginStatus" => true
          ]);
        } else {
          $_SESSION["wrongStatus"]["wrong"] = true;
          $_SESSION["wrongStatus"]["wrongPassword"] = true;

          $_SESSION["data"]["loginStatus"] = false;
        }
      } else {
        if (password_verify($this->userPassword, $hashedPassword)) {
          $_SESSION["wrongStatus"]["wrong"] = true;
          $_SESSION["wrongStatus"]["wrongUsername"] = true;

          $_SESSION["data"]["loginStatus"] = false;
        } else {
          $_SESSION["wrongStatus"]["wrong"] = true;
          $_SESSION["wrongStatus"]["wrongBoth"] = true;

          $_SESSION["data"]["loginStatus"] = false;
        }
      }
    }
  }
}

if (isset($_POST["signInButton"])) {
  $login = new LoginFunction($_POST["username"], $_POST["password"]);
}
