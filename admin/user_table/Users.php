<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/db/db_connection.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/db/DbService.php");

class Users
{

    public function getUsers(mysqli $mysqli)
    {
        $sql = DbService::getUsers();
        $result = $mysqli->query($sql);
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        return $rows;
    }

    public function addUser(mysqli $mysqli, $name, $mail, $pass, $adm)
    {
        $sql = DbService::insertUser();
        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("ssss", $username, $email, $password, $admin);
            $username = $name;
            $email = $mail;
            $password = $pass;
            $admin = $adm;
            $stmt->execute();
            $stmt->close();
            return true;
        }
        return false;
    }

    public
    function updateUser(mysqli $mysqli, $id, $data): bool
    {
        $sql = DbService::updateUser();
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("isssss", $id, $data["username"],
            $data["email"], $data["password"], $data["created_at"], $data["administrator"]);
        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }

    }
}
