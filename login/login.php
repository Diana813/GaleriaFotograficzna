<?php

class Login
{
    public string $password = '';
    public string $username = '';
    public string $username_err = '';
    public string $password_err = '';
    public string $login_err = '';

    public function checkIfUserIsLogged()
    {
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
            header("location: /welcome_page/welcome_page.php");
            exit;
        }
    }

    private function getUsername()
    {
        if (empty(trim($_POST["username"]))) {
            $this->username_err = ErrorStrings::$empty_err;
        } else {
            $this->username = trim($_POST["username"]);
        }
    }

    private function getPassword()
    {
        if (empty(trim($_POST["password"]))) {
            $this->password_err = ErrorStrings::$empty_err;
        } else {
            $this->password = trim($_POST["password"]);
        }
    }

    private function areDataValid(): bool
    {
        return empty($this->username_err) && empty($this->password_err);
    }

    private function userExist($stmt): bool
    {
        return $stmt->num_rows == 1;
    }

    public function loginUser(mysqli $mysqli)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->getUsername();
            $this->getPassword();
            if ($this->areDataValid()) {
                $sql = DbService::selectUserData();
                if ($stmt = $mysqli->prepare($sql)) {
                    $stmt->bind_param("s", $param_username);
                    $param_username = $this->username;
                    if ($stmt->execute()) {
                        $stmt->store_result();
                        if ($this->userExist($stmt)) {
                            $stmt->bind_result($id, $this->username, $hashed_password, $isAdmin);
                            if ($stmt->fetch()) {
                                if (password_verify($this->password, $hashed_password)) {
                                    session_start();
                                    $_SESSION["loggedin"] = true;
                                    $_SESSION["id"] = $id;
                                    $_SESSION["username"] = $this->username;
                                    $_SESSION["isAdmin"] = $isAdmin;
                                    header("location: /welcome_page/welcome_page.php");
                                } else {
                                    $this->login_err = ErrorStrings::$login_err_password;
                                }
                            }
                        } else {
                            $this->login_err = ErrorStrings::$login_err;
                        }
                    } else {
                        echo "Oops!";
                    }

                    $stmt->close();
                }
            }
        }
    }
}
