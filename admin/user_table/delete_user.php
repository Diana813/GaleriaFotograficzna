<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/db/db_connection.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/db/DbService.php";
require_once "Users.php";

$users = new Users();
global $mysqli;

$del_id = filter_var($_GET['user_id'], FILTER_SANITIZE_STRING);


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $userid = $del_id;

    $sql = DbService::deleteUser($userid);
    $mysqli->query($sql);

    header('location: users_file.php');
    exit();

}
