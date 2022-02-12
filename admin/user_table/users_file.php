<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/db/db_connection.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/db/DbService.php";
require_once "Users.php";

global $mysqli;
$users = new Users();
$allUsers = $users->getUsers($mysqli);
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
            <h1 class="page-header">Klienci</h1>
        </div>
        <div class="col-lg-6">
            <div class="page-action-links text-right">
                <a href="add_user.php?operation=create" class="btn btn-success"><i
                            class="glyphicon glyphicon-plus"></i> Dodaj nowego klienta</a>
            </div>
        </div>
    </div>
    <table class="table table-striped table-bordered table-condensed">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nazwa użytkownika</th>
            <th scope="col">E-mail</th>
            <th scope="col">Hasło</th>
            <th scope="col">Data utworzenia</th>
            <th scope="col">Admin</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($allUsers as $row): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo($row['username']); ?></td>
                <td><?php echo($row['email']); ?></td>
                <td><?php echo($row['password']); ?></td>
                <td><?php echo($row['created_at']); ?></td>
                <td><?php echo($row['administrator']); ?></td>
                <td>
                    <a href="edit_user.php?user_id=<?php echo $row['id']; ?>&operation=edit"
                       class="btn btn-primary"><i class="fa-solid fa-pencil"></i></a>
                    <a href="delete_user.php?user_id=<?php echo $row['id']; ?>" class="btn btn-danger delete_btn"><i class="fa-solid fa-dumpster"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php require_once 'admin/utils/success_fail_messages.php'; ?>

</div>
</body>
</html>