<?php

require_once "init.php";

$_SESSION["wrongStatus"] = [
  "wrong" => null,
  "wrongUsername" => null,
  "wrongPassword" => null,
  "wrongBoth" => null,
];

$_SESSION["data"] = [
  "sameUsername" => null,
  "userUsername" => null,
  "loginStatus" => null
];

if (isset($_COOKIE["id"])) {
  if ($_COOKIE["id"] == $_COOKIE["id"]) {
    $_SESSION["data"] = [
      "sameUsername" => null,
      "userId" => $_COOKIE["id"],
      "loginStatus" => true
    ];
  }
}

if (isset($_SESSION["data"])) {
  if ($_SESSION["data"]["loginStatus"] == true) {
    header("location: http://localhost/meme/");
  }
}

class LoginFunction extends Connection
{
  public function __construct(public string $userUsername, public string $userPassword)
  {
    $this->userUsername = htmlspecialchars(mysqli_real_escape_string($this->connection(), $userUsername));
    $this->userPassword = htmlspecialchars(mysqli_real_escape_string($this->connection(), $userPassword));

    $checkUsernameQuery = "SELECT * FROM user WHERE username = ?";
    $checkUsernameStatement = new mysqli_stmt($this->connection(), $checkUsernameQuery);

    if ($checkUsernameStatement->prepare($checkUsernameQuery)) {
      $checkUsernameStatement->bind_param("s", $this->userUsername);
      $checkUsernameStatement->execute();
      $result = $checkUsernameStatement->get_result();

      if ($result->num_rows == 1) {
        $result = $result->fetch_assoc();
        $hashedPassword = $result["password"];

        if (password_verify($this->userPassword, $hashedPassword)) {
          $_SESSION["wrongStatus"]["wrong"] = false;

          if (isset($_POST["rememberMe"])) {
            setcookie("id", $result["id"], time() + 60);
          }

          $this->redirect("/", $_SESSION["data"] = [
            "sameUsername" => null,
            "userId" => $result["id"],
            "loginStatus" => true
          ]);
        } else {
          $_SESSION["wrongStatus"]["wrong"] = true;
          $_SESSION["wrongStatus"]["wrongPassword"] = true;

          $_SESSION["data"]["loginStatus"] = false;
        }
      } else {
        global $hashedPassword;

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
