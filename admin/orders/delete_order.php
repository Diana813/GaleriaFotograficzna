<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/db/db_connection.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/db/DbService.php";

global $mysqli;

$del_id = filter_var($_GET['id'], FILTER_SANITIZE_STRING);


if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $sql = DbService::deleteOrder($del_id);
    $mysqli->query($sql);

    header('location: orders_file.php');
    exit();

}

