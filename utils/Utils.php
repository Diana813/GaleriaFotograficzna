<?php

class Utils
{
    public static function getSession($name = null)
    {
        return isset($_SESSION[$name]) ? $_SESSION[$name] : null;
    }

    public static function setItem($id)
    {
        $_SESSION['basket'][$id] = $id;
    }


    public static function removeItem($id)
    {
        $_SESSION['basket'][$id] = null;
        unset($_SESSION['basket'][$id]);
    }

}