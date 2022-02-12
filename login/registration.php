<?php

class Registration
{
    public string $confirm_password = '';
    public string $password = '';
    public string $username = '';
    public string $email = '';
    public string $password_err = '';
    public string $username_err = '';
    public string $email_err = '';
    public string $confirm_password_err = '';
    private UserVerification $user_verification;

    /**
     * @param $user_verification
     */
    public function __construct($user_verification)
    {
        $this->user_verification = $user_verification;
    }

    private function getFormData(mysqli $mysqli, string $data, string &$field, $sql, &$err)
    {
        if (empty(trim($_POST[$data]))) {
            $err = ErrorStrings::$empty_err;
        } elseif ($data == "username" and (!preg_match("/^[_a-zA-Z0-9-]+$/", trim($_POST[$data])))) {
            $err = ErrorStrings::$wrong_digits_err;
        } else {
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param("s", $param);
            $param = trim($_POST[$data]);
            if ($stmt->execute()) {
                $stmt->store_result();
                if ($stmt->num_rows == 1) {
                    $err = ErrorStrings::$already_taken_err;
                } else {
                    $field = trim($_POST[$data]);
                }
            }
            $stmt->close();
        }
    }

    private function areDataValid(): bool
    {
        return empty($this->username_err) && empty($this->email_err) && empty($this->password_err) && empty($this->confirm_password_err);
    }

    public function registerUser(mysqli $mysqli)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->getFormData($mysqli, "username", $this->username, DbService::getUserByName(), $this->username_err);
            $this->getFormData($mysqli, "email", $this->email, DbService::getUserByEmail(), $this->email_err);
            $this->user_verification->getPasswordFormData($this->password, $this->password_err);
            $this->user_verification->confirmPassword($this->password, $this->confirm_password_err,
                $this->confirm_password, $this->password_err);
            if ($this->areDataValid()) {
                $sql = DbService::insertUser();
                if ($stmt = $mysqli->prepare($sql)) {
                    $stmt->bind_param("ssss", $username, $email, $password, $admin);
                    $username = $this->username;
                    $email = $this->email;
                    $password = password_hash($this->password, PASSWORD_DEFAULT);
                    $admin = 0;
                    if ($stmt->execute()) {
                        header("location: /login/login_file.php");
                    }
                    $stmt->close();
                }
            }
        }
    }
}


