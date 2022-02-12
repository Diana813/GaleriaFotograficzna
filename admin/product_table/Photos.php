<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/db/db_connection.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/db/DbService.php");

class Photos
{

    public function getPhotos(mysqli $mysqli)
    {
        $sql = DbService::getProducts();
        $result = $mysqli->query($sql);
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        return $rows;
    }

    public function addPhoto(mysqli $mysqli, $url, $desc, $pr, $curr)
    {
        $sql = DbService::insertProduct();
        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("ssss", $image, $description, $price, $currency);
            $image = $url;
            $description = $desc;
            $price = $pr;
            $currency = $curr;
            $stmt->execute();
            $stmt->close();
            return true;
        }
        return false;
    }

    public
    function updatePhoto(mysqli $mysqli, $id, $data): bool
    {
        $sql = DbService::updatePhoto();
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("isssss", $id, $data["image"],
            $data["description"], $data["price"], $data["currency"]);
        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }

    }

}
