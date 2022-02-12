<?php
class DbService
{
    public static function selectUserData(): string
    {
        return "SELECT id, username, password, administrator FROM users WHERE username = ?";
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
        return "INSERT INTO users (username, email, password, administrator) VALUES (?, ?, ?, ?)";
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

    public static function getUsers()
    {
        return "SELECT id, username, email, password, created_at, administrator FROM users";
    }

    public static function updateUser(): string
    {
        return "UPDATE users SET username = ?, email= ?, password =?, administrator= ? WHERE id = ?";
    }

    public static function deleteUser($id): string
    {
        return "DELETE FROM users WHERE id = $id";
    }

    public static function deletePhoto($id): string
    {
        return "DELETE FROM product WHERE id = $id";
    }

    public static function insertProduct(): string
    {
        return "INSERT INTO product (image, description, price, currency) VALUES (?, ?, ?, ?)";
    }

    public static function getOrders()
    {
        return "SELECT u.id, u.email, p.image, p.id from users as u inner join orders as o on u.id = o.userID inner join product as p on p.id = o.product";
    }

    public static function addOrders()
    {
        return "INSERT INTO orders (userId, product) VALUES (?,?)";
    }

    public static function updatePhoto()
    {
        return "UPDATE product SET image = ?, description= ?, price =?, currency= ? WHERE id = ?";
    }

}