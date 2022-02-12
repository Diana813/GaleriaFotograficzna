<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/db/db_connection.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/db/DbService.php";
require_once "Photos.php";

global $mysqli;
$photos = new Photos();
$allPhotos = $photos->getPhotos($mysqli);
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
        width: 1300px;
    }
</style>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/lib/header.php" ?>
</nav>
<div class="content" id="page-wrapper">
    <div class="row">
        <div class="col-lg-6">
            <h1 class="page-header">Zdjęcia</h1>
        </div>
        <div class="col-lg-6">
            <div class="page-action-links text-right">
                <a href="add_photo.php?operation=create" class="btn btn-success"><i
                            class="glyphicon glyphicon-plus"></i> Dodaj nowege zdjęcie</a>
            </div>
        </div>
    </div>
    <div class="content">
        <table class="table table-striped table-bordered table-condensed">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Zdjęcie</th>
                <th scope="col">Opis</th>
                <th scope="col">Cena</th>
                <th scope="col">Waluta</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($allPhotos as $row): ?>
                <tr>
                    <td><?php echo($row['id']); ?></td>
                    <td>
                        <img src="<?php echo $row['image']; ?>" class="img-fluid rounded-3" width="300" height="400">
                    </td>
                    <td><?php echo($row['description']); ?></td>
                    <td><?php echo($row['price']); ?></td>
                    <td><?php echo($row['currency']); ?></td>
                    <td>
                        <a href="edit_photo.php?image_id=<?php echo $row['id']; ?>&operation=edit"
                           class="btn btn-primary"><i class="fa-solid fa-pencil"></i></a>
                        <a href="delete_photo.php?image_id=<?php echo $row['id']; ?>" class="btn btn-danger delete_btn"><i class="fa-solid fa-dumpster"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php require_once 'admin/utils/success_fail_messages.php'; ?>

</div>
</body>
</html>