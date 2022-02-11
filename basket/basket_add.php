<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/db/db_connection.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/db/DbService.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/product/ProductsCatalogue.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/utils/Utils.php";
require_once "Basket.php";
global $mysqli;

if (isset($_POST['addOrRemove']) && isset($_POST['itemId'])) {

    $out = array();
    $todo = $_POST['addOrRemove'];
    $id = $_POST['itemId'];

    $catalogue = new ProductsCatalogue();
    $product = $catalogue->getProduct($id, $mysqli);
    $basket = new Basket();

    if (!empty($product)) {
        switch ($todo) {
            case 1:
                Utils::setItem($id);
                $out['addOrRemove'] = 0;
                break;

            case 0:
                Utils::removeItem($id);
                $out['addOrRemove'] = 1;
                break;

        }
        echo json_encode($out);

    }
}

