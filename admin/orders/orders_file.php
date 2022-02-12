<?php session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/db/db_connection.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/db/DbService.php";
require_once "Orders.php";

global $mysqli;
$orders = new Orders();
$allOrders = $orders->getOrders($mysqli);
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/lib/libraries.php" ?>
</head>
<style>
    .content {
        margin: auto;
        margin-top: 20px;
    }
</style>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/lib/header.php" ?>
</nav>
<div class="content" id="page-wrapper">
    <div class="row">
        <div class="col-lg-6">
            <h1 class="page-header">Zamówienia</h1>
        </div>
    </div>
    <table class="table table-striped table-bordered table-condensed">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Obrazki</th>
            <th scope="col">Email klienta</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($allOrders as $key=> $row):
            ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo($row['image']); ?></td>
                <td><?php echo($row['email']); ?></td>
                <td>
                    <a href="delete_order.php?order_id=<?php echo $row['id']; ?>" class="btn btn-danger delete_btn"><i class="fa-solid fa-dumpster"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php require_once 'admin/utils/success_fail_messages.php'; ?>

</div>
</body>
</html>
