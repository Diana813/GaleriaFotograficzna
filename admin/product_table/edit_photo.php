<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/db/db_connection.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/db/DbService.php";
require_once "Photos.php";

global $mysqli;
$photos = new Photos();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = filter_input(INPUT_GET, 'user_id', FILTER_SANITIZE_STRING);

    $data_to_update = filter_input_array(INPUT_POST);

    $stat = $photos->updatePhoto($mysqli, $user_id, $data_to_update);

    if ($stat) {
        $_SESSION['success'] = "Dane klienta zmodyfikowane";
        header('location: photos_file.php');
        exit();
    }
}