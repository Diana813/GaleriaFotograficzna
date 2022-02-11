<?php
if(!isset($_SESSION)) {
    session_start();
}
require_once $_SERVER['DOCUMENT_ROOT'] . "/utils/UserVerification.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/product/ProductsCatalogue.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/product/Product_Item.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/db/db_connection.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/db/DbService.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/basket/Basket.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/utils/Utils.php";
?>