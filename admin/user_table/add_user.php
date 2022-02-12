<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/db/db_connection.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/db/DbService.php";
require_once "Users.php";

global $mysqli;
$users = new Users();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data_to_store = array_filter($_POST);
    $last_id = $users->addUser($mysqli, $data_to_store['username'], $data_to_store['email'],
        password_hash($data_to_store['password'], PASSWORD_DEFAULT), $data_to_store['administrator']);
    if ($last_id) {
        $_SESSION['success'] = "Dodano!";
        header('location: users_file.php');
        exit();
    } else {
        echo 'insert failed';
        exit();
    }
}

$edit = false;

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
        <div class="col-lg-12">
            <h2 class="page-header">Dodaj klienta</h2>
        </div>

    </div>
    <form class="form" action="" method="post" id="user_form" enctype="multipart/form-data">
        <?php require_once "user_form.php"; ?>
    </form>
</div>


<script type="text/javascript">
    $(document).ready(function () {
        $("#user_form").validate({
            rules: {
                f_name: {
                    required: true,
                    minlength: 3
                },
                l_name: {
                    required: true,
                    minlength: 3
                },
            }
        });
    });
</script>

</body>
</html>