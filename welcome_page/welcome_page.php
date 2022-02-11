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
<div class="container">
    <div class="p-5 my-4 bg-light rounded-3">
        <h1>Cześć, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Witaj na naszej stronie.</h1>
    </div>
</div>

<div class="container">
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/product/products_view.php" ?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="/basket/basket_script.js"></script>
</body>
</html>