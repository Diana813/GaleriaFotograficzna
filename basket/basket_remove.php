<?php

if (!empty($_SESSION["basket"])) {
    if ($_GET["id"] == $_SESSION["basket"][$_GET["id"]])
        unset($_SESSION["basket"][$_GET["id"]]);
}