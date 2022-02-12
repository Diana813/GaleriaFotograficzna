<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/utils/Utils.php";

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    Utils::removeItem($id);
}