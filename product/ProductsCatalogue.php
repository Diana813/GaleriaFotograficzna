<?php
require($_SERVER['DOCUMENT_ROOT'] . "/product/Product_Item.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/db/db_connection.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/db/DbService.php");

class ProductsCatalogue
{
    public function getProducts(mysqli $mysqli): array
    {
        $products = [];
        $sql = DbService::getProducts();
        $result = $mysqli->query($sql);
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        foreach ($rows as $key => $row) {
            $product = new Product_Item();
            $product->id = $row["id"];
            $product->image = $row["image"];
            $product->description = $row["description"];
            $product->price = number_format($row["price"], 2, '.', ',');
            $product->currency = $row["currency"];
            $products[$key] = $product;
        }
        return $products;
    }

    public function getProduct($id, mysqli $mysqli): Product_Item
    {
        $sql = DbService::getProduct($id);
        $result = $mysqli->query($sql);
        $row = $result->fetch_row();
        $product = new Product_Item();
        $product->id = $id;
        $product->image = $row[0];
        $product->description = $row[1];
        $product->price = number_format($row[2], 2, '.', ',');
        $product->currency = $row[3];
        return $product;
    }

}