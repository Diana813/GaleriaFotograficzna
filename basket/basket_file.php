<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/lib/imports.php";
UserVerification::checkIfUserIsLoggedIn();

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/lib/libraries.php" ?>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/lib/header.php" ?>
</nav>
<body>
<?php require_once "basket_view.php" ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="basket_script.js"></script>
</body>
</html>