<?php

class DbService
{
    public static function selectUserData(): string
    {
        return "SELECT id, username, password FROM users WHERE username = ?";
    }

    public static function getUserByName(): string
    {
        return "SELECT id FROM users WHERE username = ?";
    }

    public static function getUserByEmail(): string
    {
        return "SELECT id FROM users WHERE email = ?";
    }

    public static function insertUser(): string
    {
        return "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    }

    public static function resetPassword(): string
    {
        return "UPDATE users SET password = ? WHERE id = ?";
    }

    public static function getProducts()
    {
        return "SELECT id, image, description, price, currency FROM product";
    }

    public static function getProduct($id)
    {
        return "SELECT image, description, price, currency FROM product WHERE `id` = $id";
    }


    public static function removeProduct($id)
    {
        return "DELETE FROM product WHERE `id` = $id";
    }

}