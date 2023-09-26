<?php

require_once "init.php";

$_SESSION["data"] = [
  "sameUsername" => null,
  "userUsername" => null,
  "loginStatus" => null
];

class RegisterFunction extends Connection
{
  public function __construct(public string $userUsername, public string $userPassword)
  {
    $this->userUsername = htmlspecialchars(mysqli_real_escape_string($this->connection(), $userUsername));
    $this->userPassword = password_hash(htmlspecialchars(mysqli_real_escape_string($this->connection(), $userPassword)), PASSWORD_BCRYPT);

    $checkUsernameQuery = "SELECT * FROM user WHERE username = ?";
    $checkUsernameStatement = new mysqli_stmt($this->connection(), $checkUsernameQuery);

    if ($checkUsernameStatement->prepare($checkUsernameQuery)) {
      $checkUsernameStatement->bind_param("s", $this->userUsername);
      $checkUsernameStatement->execute();
      $result = $checkUsernameStatement->get_result();

      if ($result->num_rows) {
        $_SESSION["data"] = [
          "sameUsername" => true
        ];
      } else {
        $_SESSION["data"] = [
          "sameUsername" => false,
          "userUsername" => $this->userUsername,
        ];

        $registerQuery = "INSERT INTO user(username, password) VALUE(?, ?)";
        $registerStatement = new mysqli_stmt($this->connection(), $registerQuery);

        if ($registerStatement->prepare($registerQuery)) {
          $registerStatement->bind_param("ss", $this->userUsername, $this->userPassword);
          $registerStatement->execute();

          $result = $result->fetch_assoc();

          $this->redirect("/", $_SESSION["data"] = [
            "sameUsername" => null,
            "userId" => $result["id"],
            "loginStatus" => true
          ]);
        }
      }
    }
  }
}

if (isset($_POST["signUpButton"])) {
  $register = new RegisterFunction($_POST["username"], $_POST["password"]);
}
