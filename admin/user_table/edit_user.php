<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/db/db_connection.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/db/DbService.php";
require_once "Users.php";

global $mysqli;
$users = new Users();

$user_id = filter_input(INPUT_GET, 'user_id', FILTER_VALIDATE_INT);
$operation = filter_input(INPUT_GET, 'operation', FILTER_SANITIZE_STRING);
($operation == 'edit') ? $edit = true : $edit = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = filter_input(INPUT_GET, 'user_id', FILTER_SANITIZE_STRING);

    $data_to_update = filter_input_array(INPUT_POST);

    $stat = $users->updateUser($mysqli, $user_id, $data_to_update);

    if ($stat) {
        $_SESSION['success'] = "Dane klienta zmodyfikowane";
        header('location: users_file.php');
        exit();
    }
}
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
<div id="page-wrapper">
    <div class="row">
        <h2 class="page-header">Modyfikuj dane klienta</h2>
    </div>
    <form class="" action="" method="post" enctype="multipart/form-data" id="contact_form">
        <?php
        require_once('user_form.php');
        ?>
    </form>
</div>

</body>
</html>