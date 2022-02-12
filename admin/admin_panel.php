<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . "/db/db_connection.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/db/DbService.php");

global $mysqli;
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
    }
</style>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/lib/header.php" ?>
</nav>
<div class="container-lg p-2">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Centrum zarządzania światem <i class="fa-solid fa-face-flushed"></i></h1>
            </div>
        </div>
        <section class="h-100 h-custom bg-light">
            <div class="row justify-content-evenly">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div>Klienci</div>
                                </div>
                            </div>
                        </div>
                        <a href="user_table/users_file.php">
                            <div class="panel-footer">
                                <span class="pull-left">Zobacz szczegóły</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa-solid fa-wrench fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div>Zamówienia</div>
                                </div>
                            </div>
                        </div>
                        <a href="orders/orders_file.php">
                            <div class="panel-footer">
                                <span class="pull-left">Zobacz szczegóły</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-navy">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa-solid fa-image fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div>Produkty/Zdjęcia</div>
                                </div>
                            </div>
                        </div>
                        <a href="product_table/photos_file.php">
                            <div class="panel-footer">
                                <span class="pull-left">Zobacz szczegóły</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
        </section>
    </div>
    <div class="row">
        <div class="col-lg-8">
        </div>
        <div class="col-lg-4">
        </div>
    </div>
</div>
</div>
</body>
</html>