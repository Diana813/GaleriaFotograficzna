<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/db/db_connection.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/db/DbService.php";
require_once "Photos.php";

$users = new Photos();
global $mysqli;

$del_id = filter_var($_GET['image_id'], FILTER_SANITIZE_STRING);


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $image_id = $del_id;

    $sql = DbService::deletePhoto($image_id);
    $mysqli->query($sql);

    header('location: photos_file.php');
    exit();

}
