<?php

class Orders
{

    public function getOrders(mysqli $mysqli)
    {
        $sql = DbService::getOrders();
        $result = $mysqli->query($sql);
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        return $rows;
    }
}