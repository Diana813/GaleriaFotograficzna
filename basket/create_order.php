<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/lib/imports.php";

global $mysqli;

foreach ($_SESSION['basket'] as $value) {
    $sql = DbService::addOrders();
    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("ss", $userId, $productId);
        $userId = $_SESSION['basket'];
        $productId = $_SESSION['basket']['id'];
        $stmt->execute();
        $stmt->close();
    }
}
